<?php

if (isset($_SESSION['openid'])) 
    $smarty->assign('openid', $_SESSION['openid']);
else 
    $smarty->assign('openid', '');

$smarty->display("register.tpl");

?>
