<?php
namespace myapp\Core;
use myapp\Config;

class View
{
	public $templateView = "base_view"; //default template
    public $flashMessageText = "";
    public $flashMessageClass = ""; //success, info, warning, danger

	public function render($contentView, $data = null)
	{
		include Config::$viewDir.$this->templateView.".php";
	}

    public function addFlash($class, $text){
        $this->flashMessageClass = $class;
        $this->flashMessageText = $text;
    }

    public static function makePath($path)
    {
        $cutstring = "/".Config::$projectFolder."/".Config::$webFolder;
        return $cutstring.$path;
    }
}