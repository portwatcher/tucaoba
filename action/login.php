<?php

if (!check_exist($_REQUEST, array("username", "password")))
    die("Bad Request");

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];

$conn = db_connect();

$sql = sprintf("SELECT userid, nickname FROM user WHERE username='%s' AND password='%s' LIMIT 1",
        $conn->real_escape_string($user), $conn->real_escape_string($pass));

$result = $conn->query($sql);
if ($conn->errno) {
    json_reply(array(
        'errno' => $conn->errno,
        'error' => '内部错误，请重试:(',
    ));
    exit(0);
}

if ($conn->affected_rows === 0) {
    json_reply(array(
        'errno' => 1,
        'error' => '密码错误',
    ));
    exit(0);
}

$row = $result->fetch_assoc();
set_login($user, $row['nickname']);


json_reply(array(
    'errno'  => 0,
    'error'  => 'ok',
    'userid' => $row['userid'],
    'username' => $user,
    'nickname' => $row['nickname'],
));

?>
