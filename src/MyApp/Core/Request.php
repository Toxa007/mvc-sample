<?php

namespace MyApp\Core;

class Request
{
    private $data;

    public function __construct()
    {
        $this->data = $_POST;
    }

    public function getData()
    {
        return $this->data;
    }
}