<?php

class OAuth
{
    const WAP1  = 1;
    const WAP2  = 2;

    public static $prefix_authorize = "https://open.t.qq.com/cgi-bin/oauth2/authorize?";
    public static $prefix_token     = "https://open.t.qq.com/cgi-bin/oauth2/access_token?";

    public static function get_authorize_url($client_id, $callback, $state = '', $wap = '')
    {
        $params = array(
            'client_id'     => $client_id,
            'response_type' => 'code',
            'redirect_uri'  => $callback,
        );
        if (!empty($state)) { //save state to session for later verification
            $_SESSION['OAuth_state'] = $state;
            $params['state'] = $state;
        }
        if (!empty($wap))
            $params['wap'] = $wap;
        $url = self::$prefix_authorize . http_build_query($params);
        return $url;
    }

    public static function verify_state($state) {
        if (isset($_SESSION['OAuth_state']) && $_SESSION['OAuth_state'] == $state)
            return true;
        else
            return false;
    }

    public static function get_access_token($client_id, $client_secret, $code, $callback, $state = '')
    {
        $params = array(
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri'  => $callback,
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'state'         => $state,
        );

        $url = self::$prefix_token . http_build_query($params);
        $response_text = @file_get_contents($url);
        parse_str($response_text, $response);

        var_dump($response_text);

        if (isset($response['access_token'])) { //okay
            if (!isset($response['state']) || $response['state'] != $state) {
                return false; //state not match
            }
            return $response;
        }
        else { //request failed
            return false;
        }
    }

    public static function refresh_access_token($client_id, $refresh_token) {
        $params = array(
            'client_id'  => $client_id, 
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
        );

        $url = self::$prefix_token . http_build_query($params);
        $response_text = @file_get_contents($url);
        parse_str($response_text, $response);

        if (isset($response['access_token'])) { //okay
            return $response;
        }
        else {
            return false;
        }
    }
}

class Tencent
{
    //接口url
    public static $apiUrlHttp = 'http://open.t.qq.com/api/';
    public static $apiUrlHttps = 'https://open.t.qq.com/api/';

    public $client_id;
    public $access_token;
    public $openid;

    public $debug = false;

    public function __construct($client_id, $access_token, $openid, $debug = false)
    {
        $this->client_id    = $client_id;
        $this->access_token = $access_token;
        $this->openid       = $openid;
        $this->debug        = $debug;
    }

    public function api($command, $params = array(), $method = 'GET', $multi = false)
    {
        $constants = array(
            'access_token'       => $this->access_token,
            'oauth_consumer_key' => $this->client_id,
            'openid'             => $this->openid,
            'oauth_version'      => '2.a',
            'clientip'           => self::get_remote_addr(),
            'scope'              => 'all',
            'appfrom'            => 'php-sdk2.0beta',
            'seqid'              => time(),
            'serverip'           => $_SERVER['SERVER_ADDR'],
            'format'             => 'json',
        );
        $params = array_merge($constants, $params);

        $url = self::$apiUrlHttps.trim($command, '/');

        //请求接口
        $r = self::http_request($url, $params, $method, $multi);
        $r = preg_replace('/[^\x20-\xff]*/', "", $r); //清除不可见字符
        $r = iconv("utf-8", "utf-8//ignore", $r); //UTF-8转码
        if ($this->debug) {
            echo "Request: ", var_export($params, true), "\nResponse: ", $r, "\n";
        }
        return $r;
    }

    //获取客户端IP
    public static function get_remote_addr()
    {
        if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
            $ip = getenv ( "HTTP_CLIENT_IP" );
        else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
            $ip = getenv ( "HTTP_X_FORWARDED_FOR" );
        else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
            $ip = getenv ( "REMOTE_ADDR" );
        else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
            $ip = $_SERVER ['REMOTE_ADDR'];
        else
            $ip = "unknown";
        return ($ip);
    }

    /**
     * 发起一个HTTP/HTTPS的请求
     * @param $url 接口的URL 
     * @param $params 接口参数   array('content'=>'test', 'format'=>'json');
     * @param $method 请求类型    GET|POST
     * @param $multi 图片信息
     * @param $extheaders 扩展的包头信息
     * @return string
     */
    public static function http_request( $url , $params = array(), $method = 'GET' , $multi = false, $extheaders = array())
    {
        if(!function_exists('curl_init')) exit('Need to open the curl extension');
        $method = strtoupper($method);
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_USERAGENT, 'PHP-SDK OAuth2.0');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ci, CURLOPT_TIMEOUT, 3);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ci, CURLOPT_HEADER, false);
        $headers = (array)$extheaders;
        switch ($method)
        {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if (!empty($params))
                {
                    if($multi)
                    {
                        foreach($multi as $key => $file)
                        {
                            $params[$key] = '@' . $file;
                        }
                        curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                        $headers[] = 'Expect: ';
                    }
                    else
                    {
                        curl_setopt($ci, CURLOPT_POSTFIELDS, http_build_query($params));
                    }
                }
                break;
            case 'DELETE':
            case 'GET':
                $method == 'DELETE' && curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if (!empty($params))
                {
                    $url = $url . (strpos($url, '?') ? '&' : '?')
                        . (is_array($params) ? http_build_query($params) : $params);
                }
                break;
        }
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );
        curl_setopt($ci, CURLOPT_URL, $url);
        if($headers)
        {
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
        }

        $response = curl_exec($ci);
        curl_close ($ci);
        return $response;
    }
}

