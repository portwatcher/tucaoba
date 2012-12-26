<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
ob_start();
session_start();

define("ROOT", dirname(__FILE__));

require(ROOT . '/config.php');
require(ROOT . '/library.php');
require(ROOT . '/smarty/Smarty.class.php');

if (get_magic_quotes_gpc())
    foreach ($_REQUEST as $k => &$v)
        $v = stripslashes($v);

//method
$method           = strtolower($_SERVER['REQUEST_METHOD']);

//ip
$client_ip        = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $client_ip    = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

//action
$action = "index";
if (isset($_REQUEST['action']))
    $action = basename($_REQUEST['action']);

$is_login = check_login();

$smarty = new Smarty();
$smarty->template_dir = ROOT . '/tpl';
$smarty->config_dir   = ROOT . '/smarty/config';
$smarty->compile_dir  = ROOT . '/smarty/compile';
$smarty->cache_dir    = ROOT . '/smarty/cache';
$smarty->caching      = false;
$smarty->debugging    = config::$debug;

$smarty->assign('action', $action);
$smarty->assign('is_login', $is_login);
$smarty->assign('username', sess_get('username'));
$smarty->assign('nickname', sess_get('nickname'));

$filename = ROOT . '/action/' . $action . '.php';
if (!is_file($filename) || !is_readable($filename))
{
    $smarty->assign("page_title", "出错啦");
    $smarty->assign("message", '页面不存在...');
    $smarty->assign("next", '?action=index');
    $smarty->display("message.tpl");
    exit();
}

try {
    require($filename);
}
catch(Exception $e) {
    db_close();
    //log $e
    $x_request = arr_get($_SERVER, 'HTTP_X_REQUESTED_WITH', '');
    if (strtolower($x_request) == "xmlhttprequest")
        json_reply(array(
            'errno' => $e->getCode(),
            'error' => $e->getMessage(),
        ));
    else
    {
        $smarty->assign("page_title", "出错啦...");
        $smarty->assign("message", $e->getCode() . ': ' . $e->getMessage());
        $smarty->display("message.tpl");
    }
}
exit();

?>
