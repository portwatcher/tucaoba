<?php

if ($_REQUEST['platform'] == 't.qq.com') 
{
    if (!isset($_GET['code']))
        die("#bad request");

    $openid = 't.qq.com|' . $_GET['openid'];
    /*
    $callback = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php?action=callback&platform=t.qq.com';
    $exchange = OAuth::get_access_token(config::$QQ_APP_ID, config::$QQ_APP_SECRET,
            $_GET['code'], $callback, rand() % 1000);

    if (!$exchange)
        die("get access_token failed");

    $_SESSION['access'] = array(
        'platform'  => 't.qq.com',
        'access'    => array_merge($_GET, $exchange),
    );
    */
}
else if ($_REQUEST['platform'] == 'renren.com')
{
    $callback = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php?action=callback&platform=renren.com';

    $code = $_REQUEST['code'];
    $url = sprintf("https://graph.renren.com/oauth/token?grant_type=authorization_code" 
            . "&client_id=%s&client_secret=%s&redirect_uri=%s&code=%s",
            config::$RR_APP_ID, config::$RR_APP_SECRET, urlencode($callback), $code);

    $info = @file_get_contents($url);
    if (!$info) {
        die("can't get access token from renren");
    }

    $info = json_decode($info, true);
    $openid = "renren.com|" . $info['user']['id'];
}
else {
    die("unknown platform");
}

$conn = db_connect();

$sql = sprintf("SELECT username, nickname FROM user WHERE username='%s' limit 1", escape($openid));

$result = $conn->query($sql);
if ($conn->affected_rows == 1) {
    $row = $result->fetch_assoc();
    set_login($row['username'], $row['nickname']);
    header("Location: index.php");
    exit();
}

sess_set('openid', $openid);

header("Location: ?action=register#2");

?>
