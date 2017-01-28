<?php
namespace MyApp;

class Config
{
    protected static $config = [
        'path' => [
            'projectNamespace' => "MyApp",
            'viewDir' => __DIR__ . '/View/',
        ],
        'default' => [
            'controller' => "Main",
            'action' => "index",
        ],
        'db' => [
            'host' => "127.0.0.1",
            'port' => "null",
            'name' => "shop",
            'user' => "root",
            'password' => "123456",
            'charset' => "utf8",
        ],
    ];

    private function __construct() {}

    public static function get($key)
    {
        return self::$config[$key];
    }

}
