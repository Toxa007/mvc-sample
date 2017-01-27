<?php

namespace MyApp\Core;

use MyApp\Config;

class View
{
    private $templateView = "base_view.php"; //default template
    private $flashMessageText = "";
    private $flashMessageClass = ""; //success, info, warning, danger

    public function render($contentView, $data = null)
    {
        include Config::$viewDir.$this->templateView;
    }

    public function __construct()
    {
        Session::init();
        $this->flashMessageClass = Session::get('flash_class');
        $this->flashMessageText = Session::get('flash_text');
        Session::set('flash_class', "");
        Session::set('flash_text', "");
    }

    public function addFlash($class, $text)
    {
        //for redirect
        Session::set('flash_class', $class);
        Session::set('flash_text', $text);
        //for now
        $this->flashMessageClass = $class;
        $this->flashMessageText = $text;
    }

    public function showFlash()
    {
        include Config::$viewDir."flash_message.php";
    }

    public function getFlashText()
    {
        return $this->flashMessageText;
    }

    public function getFlashClass()
    {
        return $this->flashMessageClass;
    }
}
