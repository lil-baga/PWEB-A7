<?php

function view($page, $data = [])
{
    extract($data);
    include 'resources/views/' . $page . '.php';
}

class Router
{
    public static $urls = [];

    function __construct()
    {
        $url = implode(
            "/",
            array_filter(
                explode(
                    "/",
                    str_replace(
                        $_ENV['BASEDIR'],
                        "",
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ),
                'strlen'
            )
        );

        if (!in_array($url, self::$urls['routes'])) {
            header('Location: ' . BASEURL);
        }

        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
        $call();
    }
    public static function url($url, $method, $callback)
    {
        if ($url == '/') {
            $url = '';
        }
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
}

function urlpath($path)
{
    require_once 'config/static.php';
    return BASEURL . $path;
}