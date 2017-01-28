<?php

namespace MyApp\Model;

use MyApp\Entity\Product;
use PDO;
use MyApp\Config;

class ProductMapper
{
    protected $db;

    public function __construct()
    {
        $db = Config::get('db');
        $dsn = "mysql:host=".$db['host'].";dbname=".$db['name'].";charset=".$db['charset'];
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $db = new PDO($dsn, $db['user'], $db['password'], $opt);
        $this->db = $db;
    }

    public function findAllProducts()
    {
        $data = $this->db->query('SELECT id, name, price, description FROM products')->fetchAll();
        $products = [];
        foreach ($data as $row) {
            $product = new Product();
            $product->setAttributes($row);
            $products[] = $product;
        }
        return $products;
    }
    
    public function findProduct($id)
    {
        $product = new Product();
        $stmt = $this->db->prepare('SELECT id, name, price, description FROM products WHERE id = ?');
        $stmt->execute([$id]);
        if ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            $product->setAttributes($row);
        }
        return $product;
    }

    private function bindParams(\PDOStatement $statement, $params)
    {
        foreach ($params as $key => $val) {
            $statement->bindValue($key, $val);
        }
    }

    public function saveProduct(Product $product)
    {
        if ($product->getId()) {
            $sql = "UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $this->bindParams($statement, [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ]);
            $statement->execute();
        } else {
            $sql = "INSERT INTO products (name, price, description) VALUES (:name, :price, :description)";
            $statement = $this->db->prepare($sql);
            $this->bindParams($statement, [
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'description' => $product->getDescription(),
            ]);
            $statement->execute();
            $product->setId($this->db->lastInsertId());
        }
    }

    public function removeProduct(Product $product)
    {
        $id = $product->getId();
        if ($id > 0) {
            $stmt = $this->db->prepare('delete FROM products WHERE id = ?');
            $stmt->execute([$id]);
            return true;
        }
        return false;
    }
}
