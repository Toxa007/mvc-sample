<?php

namespace MyApp\Controller;

use MyApp\Core\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $this->view->render('Main/main.html.twig');
    }
}
