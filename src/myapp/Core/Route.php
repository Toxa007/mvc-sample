<?php

namespace myapp\Core;

use myapp\Config;

class Route
{
    public static function start()
    {
        //default
        $namespace = "\\".Config::$projectName."\\";
        $controllerName = Config::$defaultController;
        $actionName = Config::$defaultAction;

        //get routes
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }
        $paramValue = "";
        if (!empty($routes[3])) {
            $paramValue = $routes[3];
        }

        //prefixes
        $controllerName = $namespace."Controller\\".ucfirst($controllerName).'Controller';
        $actionName = 'action'.ucfirst($actionName);

        //create controller and run action
        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if(method_exists($controller, $actionName)) {
                $controller->$actionName($paramValue);
                return;
            }
        }
        //no controller or action = 404
        self::ErrorPage404();
    }

    public static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}