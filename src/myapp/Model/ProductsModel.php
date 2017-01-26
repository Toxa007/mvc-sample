<?php
namespace myapp\Model;
use myapp\Core\Model;
use myapp\Entity\Product;

class ProductsModel extends Model
{
    public function getProducts()
    {
        //$productsList = DB::findAll('products');

        $prod1 = new Product();
        $prod1->setName('prod1');
        $prod1->setPrice('222');
        $prod1->setDescription('ololo');

        $prod2 = new Product();
        $prod2->setName('prod2');
        $prod2->setPrice('333');
        $prod2->setDescription('ololo ololo');

        $prod3 = new Product();
        $prod3->setName('prod3');
        $prod3->setPrice('444');
        $prod3->setDescription('ololo ololo ololo');

        $productsList = [$prod1, $prod2, $prod3];
        return $productsList;
    }

    public function findProduct($id)
    {
        $product = new Product();
        //DB::find('products', ['id' => $id]);

        $product->setName('prod1');
        $product->setPrice('222');
        $product->setDescription('ololo');

        return $product;
    }
}