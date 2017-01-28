<?php

namespace MyApp\Core;

use MyApp\Config;

class Route
{
    public static function start()
    {
        //default
        $path = Config::get('path');
        $default = Config::get('default');
        
        $namespace = '\\'.$path['projectNamespace'].'\\';
        $controllerName = $default['controller'];
        $actionName = $default['action'];

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
        $controllerName = $namespace . 'Controller\\' . ucfirst($controllerName) . 'Controller';
        $actionName = 'action' . ucfirst($actionName);

        //create controller and run action
        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if (method_exists($controller, $actionName)) {
                $controller->$actionName($paramValue);
                return;
            }
        }
        //no controller or action = 404
        self::pageNotFound();
    }

    public static function pageNotFound()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:/404');
    }
}
