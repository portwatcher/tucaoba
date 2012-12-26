<?php

$user = sess_get('nickname');
$content = arr_get($_REQUEST, 'content');
$color = arr_get($_REQUEST, 'color');

if (empty($user)) {
    $user = '匿名用户';
}

if (empty($content)) {
    json_reply(array('errno' => 2, 'error' => 'bad request'));
    exit;
}

$ret = add_content($user, $content, $color, time());

json_reply(array('errno' => $ret, 'error' => $ret ? '请求失败，请重试' : 'ok'));

?>
