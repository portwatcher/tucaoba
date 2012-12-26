<?php

function db_connect()
{
    $conn = new mysqli(config::$dbhost, config::$dbuser, config::$dbpass, config::$dbname);
    if (mysqli_connect_errno()) 
        throw new exception("connect to database failed", mysqli_connect_errno());
    $conn->set_charset("utf8");
    $GLOBALS['__conn'] = $conn;
    return $conn;
}

function db_close()
{
    $conn = arr_get($GLOBALS, '__conn');
    if (is_resource($conn)) {
        $conn->close();
        unset($GLOBALS['__conn']);
    }
}

function arr_get($arr, $key, $default = null)
{
    return isset($arr[$key]) ? $arr[$key] : $default;
}

function sess_set($key, $value)
{
    $_SESSION[config::$sess_name][$key] = $value;
}

function sess_get($key, $default = null)
{
    return arr_get(arr_get($_SESSION, config::$sess_name, array()), $key, $default);
}

function check_login()
{
    if (sess_get('ip') == $_SERVER['REMOTE_ADDR'])
        return true;
    else
        return false;
}

function set_login($username, $nickname)
{
    sess_set('ip', $_SERVER['REMOTE_ADDR']);
    sess_set('username', $username);
    sess_set('nickname', $nickname);
}

function set_logout()
{
    unset($_SESSION[config::$sess_name]);
}

function check_exist($arr, $keys)
{
    foreach ($keys as $key)
        if (!isset($arr[$key]))
            return false;
    return true;
}

function is_ie()
{
    return strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== false ? 1 : 0;
}

function json_reply($arr)
{
    ob_clean();
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($arr);
}

function json_reply2($errno, $error)
{
    json_reply(array('errno' => $errno, 'error' => $error));
}

function escape($val) {
    $conn = $GLOBALS['__conn'];
    return $conn->real_escape_string($val);
}

function add_content($user, $content, $color, $tm, $circle = 0) {
    $conn = db_connect();
    $sql = sprintf("INSERT INTO tucao (username, tucao, color, time, circleid) VALUES ('%s', '%s', '%s', '%s', '%s')",
                    escape($user), escape($content), escape($color), date('Y-m-d H:i:s', $tm), escape($circle));

    $conn->query($sql);

    return $conn->errno;
}

?>
