<?php

//TODO: обработка исключений, dao

namespace MyApp\Controller;

use MyApp\Core\Controller;
use MyApp\Entity\Product;
use MyApp\Model\ProductForm;
use MyApp\Model\ProductMapper;

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
        $this->view->render('Product/list.html.twig', [
            'products' => $products
        ]);
    }

    public function actionAdd()
    {
        $product = new Product();
        $form = new ProductForm($product);
        $form->handleRequest();
        if ($form->isValid()) {
            $this->model->saveProduct($product);
            $this->view->addFlash(
                'success',
                'Product #'.$product->getId().' added!'
            );
            $this->redirect('/products/list');
        }
        if (!empty($form->getFormErrors())) {
            $this->view->addFlash(
                'danger',
                $form->getFormErrorsHtml(),
                false
            );
        }
        $this->view->render('Product/form.html.twig', [
            'form_data' => $form->getFormData(),
        ]);
    }

    public function actionEdit($id)
    {
        $product = $this->model->findProduct($id);
        if ($product->getId()!=$id) {
            $this->view->addFlash(
                'danger',
                'Product #'.$id.' not found!'
            );
            $this->redirect('/products/list');
        }
        $form = new ProductForm($product);
        $form->handleRequest();
        if ($form->isValid()) {
            $this->model->saveProduct($product);
            $this->view->addFlash(
                'success',
                'Product #'.$id.' edited!'
            );
            $this->redirect('/products/list');
        }
        if (!empty($form->getFormErrors())) {
            $this->view->addFlash(
                'danger',
                $form->getFormErrorsText(),
                false
            );
        }
        $this->view->render('Product/form.html.twig', [
            'form_data' => $form->getFormData(),
        ]);
    }

    public function actionDelete($id)
    {
        $product = $this->model->findProduct($id);
        if (!is_null($product)) {
            $this->model->removeProduct($product);
            $this->view->addFlash(
                'success',
                'Product #'.$id.' deleted!'
            );
        } else {
            $this->view->addFlash(
                'danger',
                'Product #'.$id.' not found!'
            );
        }
        $this->redirect('/products/list');
    }
}
