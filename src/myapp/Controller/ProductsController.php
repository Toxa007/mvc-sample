<?php

//todo: navbar (?), обработка форм (handleRequest)/валидация (is int не работает)/оставить введенные данные, flash-сообщения в сессиях, обработка исключений


namespace myapp\Controller;

use myapp\Core\Controller;
use myapp\Config;
use myapp\Entity\Product;
use myapp\Model\ProductMapper;
use myapp\Model\ProductsModel;


class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->model = new ProductMapper();
    }

    public function actionList()
    {
        $products = $this->model->findAllProducts();
        
        $this->view->render('list_view', [
            'products' => $products
        ]);
    }

    public function actionAdd()
    {
        $product = new Product();
        if (!empty($_POST)) {
            //validate
            $valid = 1;
            $name = $_POST['product']['name'];
            $price = $_POST['product']['price']*1;
            $description = $_POST['product']['description'];
            if(!is_string($name)) {
                $this->view->addFlash(
                    'danger',
                    'Name should be string!'
                );
                $valid = 0;
            }
            if(!is_int($price)) {
                $this->view->addFlash(
                    'danger',
                    'Price should be int!'
                );
                $valid = 0;
            }
            if(!is_string($description)) {
                $this->view->addFlash(
                    'danger',
                    'Description should be string!'
                );
                $valid = 0;
            }

            if($valid) {
                $product->setName($name);
                $product->setPrice($price);
                $product->setDescription($description);
                
                $this->model->saveProduct($product);

                $this->view->addFlash(
                    'success',
                    'Product #'.$product->getId().' added!'
                );
                //$this->redirect('products/list');
            }
        }

        $this->view->render('form_view', [
            'product' => $product
        ]);
    }

    public function actionEdit($id)
    {
        $product = $this->model->findProduct($id);
/*
$form = createForm('formtype',$product); /по ссылке, заполняется данными
$form->handleRequest($_POST);
if($form->isValid()) {
    $this->model-save($product);
}
...
->render('tpl',[
    'form' => $form->createView(),
]);
 */
        if (!empty($_POST)) {
            $id = $_POST['product']['id']*1;
            if($id > 0) {
                //validate
                $valid = 1;
                $name = $_POST['product']['name'];
                $price = $_POST['product']['price']*1;
                $description = $_POST['product']['description'];
                var_dump($price);
                if(!is_string($name)) {
                    $this->view->addFlash(
                        'danger',
                        'Name should be string!'
                    );
                    $valid = 0;
                }
                if(!is_int($price)) {
                    $this->view->addFlash(
                        'danger',
                        'Price should be int!'
                    );
                    $valid = 0;
                }
                if(!is_string($description)) {
                    $this->view->addFlash(
                        'danger',
                        'Description should be string!'
                    );
                    $valid = 0;
                }

                if($valid) {
                    $product->setId($id);
                    $product->setName($name);
                    $product->setPrice($price);
                    $product->setDescription($description);

                    $this->model->saveProduct($product);

                    $this->view->addFlash(
                        'success',
                        'Product #'.$product->getId().' edited!'
                    );
                    //$this->redirect('products/list');
                }
            }
        }

        $this->view->render('form_view', [
            'product' => $product,
        ]);
    }

    public function actionDelete($id)
    {
        $product = $this->model->findProduct($id);
        if(!is_null($product)) {
            $this->model->removeProduct($product);
            $this->view->addFlash(
                'success',
                'Product #'.$id.' deleted!'
            );
        }
        else{
            $this->view->addFlash(
                'danger',
                'Product #'.$id.' not found!'
            );
        }
        $this->redirect('products/list');
    }
}