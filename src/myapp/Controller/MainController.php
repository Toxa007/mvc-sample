<?php

namespace myapp\Controller;

use myapp\Core\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $this->view->render('main_view');
    }
}