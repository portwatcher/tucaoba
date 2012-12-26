<?php

$nickname = arr_get($_REQUEST, 'nickname');
if (empty($nickname)) {
    json_reply2(1, 'nickname is empty');
    exit;
}

$username = arr_get($_REQUEST, 'username');
$password = arr_get($_REQUEST, 'password');

$conn = db_connect();

$sql = '';

$openid = sess_get('openid');
if (!empty($openid)) {
    $sql = sprintf("INSERT INTO user (username, nickname, password) VALUES ('%s', '%s', '')",
                    escape($openid), escape($nickname));
    $username = $openid;
}
else {
    if (empty($username) or empty($password))
    {
        json_reply2(2, 'username/password is empty');
        exit;
    }

    $sql = sprintf("INSERT INTO user (username, nickname, password) VALUES ('%s', '%s', '%s')",
                    escape($username), escape($nickname), escape($password));
}

$conn->query($sql);
if ($conn->errno) {
    json_reply2($conn->errno, 'update database failed' . $sql);
    exit;
}

sess_set('openid', null);
set_login($username, $nickname);
json_reply2(0, 'ok');

?>
