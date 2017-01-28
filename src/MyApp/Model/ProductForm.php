<?php

namespace MyApp\Model;

use MyApp\Entity\Product;

class ProductForm
{
    private $product;
    private $data = [];
    private $valid = false;
    private $errors = [];

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->data['id'] = $product->getId();
        $this->data['name'] = $product->getName();
        $this->data['price'] = $product->getPrice();
        $this->data['description'] = $product->getDescription();
    }

    private function validateFormData()
    {
        $validator  = $this->product->getValidator();
        foreach ($this->data as $key => $val) {
            if (isset($validator[$key])) {
                if (($filtered_data = filter_var($this->data[$key], $validator[$key]['filter'])) === false) {
                    $this->errors[] = [
                        'message' => "{$key} should be {$validator[$key]['name']}",
                    ];
                } else {
                    $this->data[$key] = $filtered_data;
                }
            }
        }
        if (empty($this->errors)) {
            $this->valid = true;
        }
    }

    public function handleRequest()
    {
        if (!empty($_POST)) {
            $this->data = $_POST['product'];
            $this->validateFormData();
            if ($this->isValid()) {
                $this->product->setAttributes($this->data);
            }
        }
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getFormErrors()
    {
        return $this->errors;
    }

    //refactor to formBuilder/formCreateView with input_types, errors, templates, etc.
    public function getFormErrorsText()
    {
        $errorMessage = "";
        if (!empty($this->errors)) {
            foreach ($this->errors as $error) {
                $errorMessage .= $error['message']."\n\r";
            }
        }
        return $errorMessage;
    }
    
    public function getFormData()
    {
        return $this->data;
    }
}
