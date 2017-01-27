<?php
namespace MyApp;

class Config
{
    public static $projectName = "MyApp";
    public static $projectFolder ="my";
    public static $webFolder = "web";
    public static $viewFolder = "";

    public static $viewDir = __DIR__ . '/View/';

    public static $defaultController = "Main";
    public static $defaultAction = "index";

    public static $dbHost = "127.0.0.1";
    public static $dbPort = "null";
    public static $dbName = "shop";
    public static $dbUser = "root";
    public static $dbPassword = "123456";
    public static $dbCharset = "utf8";
}
