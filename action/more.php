<?php

$last = sess_get('lasttime');

$conn = db_connect();
$sql = sprintf("SELECT * FROM tucao WHERE time >= '%s'", date("Y-m-d H:i:s", $last));
$result = $conn->query($sql);

if ($conn->errno) {
    json_reply(array(
        'errno' => $conn->errno,
        'error' => $conn->error,
    ));
    exit();
}

$ret = array();
while ($row = $result->fetch_assoc()) {
    $ret[] = array(
        'tucaoid'  => $row['tucaoid'],
        'user'     => $row['username'],
        'content'  => $row['tucao'],
        'color'    => $row['color'],
        'date'     => $row['time'],
    );
}

sess_set('lasttime', time());

json_reply($ret);

?>
