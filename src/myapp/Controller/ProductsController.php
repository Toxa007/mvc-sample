<?php

//todo: обработка форм, реализация класса БД и взаимодействие с ним модели, обработка исключений


namespace myapp\Controller;

use myapp\Core\Controller;
use myapp\Config;
use myapp\Entity\Product;
use myapp\Model\ProductsModel;

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->model = new ProductsModel();
    }

    public function actionList()
    {
        $products = $this->model->getProducts();
        $cutstring = "/".Config::$projectFolder."/".Config::$webFolder;

        $this->view->render('list_view', [
            'products' => $products,
            'cutstring' => $cutstring,
        ]);
    }

    public function actionAdd()
    {
        $product = new Product();
        /*
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $product = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            $this->addFlash(
                'notice',
                'New product added!'
            );
            return $this->redirectToRoute('homepage');
        }
        */
        $this->view->render('form_view', [
            'product' => $product
        ]);
    }

    public function actionEdit($id)
    {
        $product = $this->model->findProduct($id);

        /*
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $product = $form->getData();
            //$em->persist($product);
            $em->flush();
            $this->addFlash(
                'notice',
                'Product #'.$pid.' updated!'
            );
            return $this->redirectToRoute('homepage');
        }
        */
        $this->view->render('form_view', [
            'product' => $product,
        ]);
    }

    public function actionDelete($id)
    {
        echo "id = {$id}";
        /*
        $product = $this->model->findProduct($id);
        if(!is_null($product)) {
            $this->model->remove($product);
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
        */
    }
}