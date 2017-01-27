<?php

namespace MyApp\Core;

use MyApp\Config;

class View
{
    public $templateView = "base_view.php"; //default template
    public $flashMessageText = "";
    public $flashMessageClass = ""; //success, info, warning, danger

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
        Session::set('flash_class', $class);
        Session::set('flash_text', $text);
    }
}
