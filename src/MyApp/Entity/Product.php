<?php

namespace MyApp\Entity;

class Product
{
    private $id = 0;
    private $name;
    private $price;
    private $description;

    public function setId($id)
    {
        $this->id  = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setAttributes($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->description = $data['description'];
    }

    public function getValidator()
    {
        return [
            'id' => ['name' => 'Integer', 'filter' => FILTER_VALIDATE_INT],
            'name' => ['name' => 'String', 'filter' => FILTER_SANITIZE_STRING],
            'price' => ['name' => 'Integer', 'filter' => FILTER_VALIDATE_INT],
            'description' => ['name' => 'String', 'filter' => FILTER_SANITIZE_STRING],
        ];
    }
}
