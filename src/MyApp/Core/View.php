<?php

namespace MyApp\Core;

use MyApp\Config;
use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
    private $twig;
    private $flashMessageText = "";
    private $flashMessageClass = ""; //success, info, warning, danger

    public function render($contentView, $data = [])
    {
        if ($this->flashMessageClass != "" && $this->flashMessageText != "") {
            $data['flash'] = [
                'class' => $this->flashMessageClass,
                'text' => $this->flashMessageText
            ];
        }
        echo $this->twig->render($contentView, $data);
    }

    public function __construct()
    {
        $path = Config::get('path');
        $loader = new Twig_Loader_Filesystem($path['viewDir']);
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false,
        ));
        Session::init();
        $this->flashMessageClass = Session::get('flash_class');
        $this->flashMessageText = Session::get('flash_text');
        Session::set('flash_class', "");
        Session::set('flash_text', "");
    }

    public function addFlash($class, $text, $redirect = true)
    {
        if ($redirect === true) {
            Session::set('flash_class', $class);
            Session::set('flash_text', $text);
        } else {
            $this->flashMessageClass = $class;
            $this->flashMessageText = $text;
        }
    }
}