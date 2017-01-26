<?php
namespace myapp\Core;

class Controller {
	
	public $model;
	public $view;
	
	public function __construct()
	{
		$this->view = new View();
	}

	public function redirect($path)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        $url = $host.$path;
        header('Location:'.$url);
    }
	
}