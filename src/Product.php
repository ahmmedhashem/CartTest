<?php
namespace App;

class Product
{
    public $code;
    public $price;
    public $name;

    public function __construct($code, $name, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }
}