<?php

namespace MyApp\Core;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function redirect($url, $statusCode=302)
    {
        header('Location: '.$url, true, $statusCode);
    }
}
