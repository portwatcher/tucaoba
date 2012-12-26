<?php

/*
    File: index.php
    Author: felix021@gmail.com
    Date: 2012.11.26
    Usage: 公众平台的请求入口 + 示例(验证+消息)
 */

require_once("../config.php");
require_once("../library.php");
require_once(dirname(__FILE__) . "/wechat.php");


$w = new Wechat(config::get('token'), config::get('debug'));

//首次验证，验证过以后可以删掉
if (isset($_GET['echostr'])) {
    $w->valid();
    exit();
}

//回复用户
$w->reply("reply_cb");
exit();

function reply_cb($request, $w)
{
    if ($w->get_msg_type() != "text") {
        return config::get('msg_not_text');
    }

    $content = trim($request['Content']);
    if ($content === "Hello2BizUser") { //貌似第一次加入会发送这个
        return config::get('msg_welcome');
    }

    if (empty($content))
        return config::get('msg_empty_req');

    $conn = db_connect();
    $ret = add_content('微信用户', $content, '', time());
    db_close();
    if ($ret == 0)
        return '吐槽已发布，访问http://www.tucaoba.us/ 查看:-)';
    else
        return '出错了，请重新吐槽:(';
}

?>
