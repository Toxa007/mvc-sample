<?php

namespace myapp\Model;

use myapp\Entity\Product;
use PDO;
use myapp\Config;

class ProductMapper
{
    protected $db;

    public function __construct()
    {
        $dsn = "mysql:host=".Config::$dbHost.";dbname=".Config::$dbName.";charset=".Config::$dbCharset;
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $db = new PDO($dsn, Config::$dbUser, Config::$dbPassword, $opt);

        $this->db = $db;
    }

    protected function fillProduct(Product &$product, $row)
    {
        $product->setId($row['id']);
        $product->setName($row['name']);
        $product->setPrice($row['price']);
        $product->setDescription($row['description']);
    }

    public function findAllProducts()
    {
        $data = $this->db->query('SELECT id, name, price, description FROM products')->fetchAll(PDO::FETCH_UNIQUE);
        $products = array();
        foreach($data as $id => $row)
        {
            $product = new Product();
            $row['id'] = $id;
            $this->fillProduct($product, $row);
            $products[] = $product;
        }

        return $products;
    }
    
    public function findProduct($id)
    {
        $product = new Product();
        $stmt = $this->db->prepare('SELECT id, name, price, description FROM products WHERE id = ?');
        $stmt->execute([$id]);
        if($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
            $this->fillProduct($product, $row);
        }

        return $product;
    }

    public function saveProduct(Product &$product)
    {
        if ($product->getId()) {
            $sql = "UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $name = $product->getName();
            $statement->bindParam("name", $name);
            $price = $product->getPrice();
            $statement->bindParam("price", $price);
            $desc = $product->getDescription();
            $statement->bindParam("description", $desc);
            $id = $product->getId();
            $statement->bindParam("id", $id);
            $statement->execute();
        }
        else {
            $sql = "INSERT INTO products (name, price, description) VALUES (:name, :price, :description)";
            $statement = $this->db->prepare($sql);
            $name = $product->getName();
            $statement->bindParam("name", $name);
            $price = $product->getPrice();
            $statement->bindParam("price", $price);
            $desc = $product->getDescription();
            $statement->bindParam("description", $desc);
            $statement->execute();
            $product->setId($this->db->lastInsertId());
        }
    }

    public function removeProduct(Product &$product)
    {
        $id = $product->getId();
        if($id > 0) {
            $stmt = $this->db->prepare('delete FROM products WHERE id = ?');
            $stmt->execute([$id]);
            return true;
        }
        return false;
    }

}