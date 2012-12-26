<?php

sess_set('lasttime', time());

$conn = db_connect();
$sql = sprintf("SELECT * FROM tucao ORDER BY tucaoid DESC LIMIT 20");
$result = $conn->query($sql);

if ($conn->errno) {
    die("err happened :(");
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

$smarty->assign('page_title', '首页');
$smarty->assign('init_data', $ret);
$smarty->display("index.tpl");

?>
