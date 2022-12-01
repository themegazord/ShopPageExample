<?php

class Product {
    private $id;
    private $name;
    private $price;
    private $image;
    private $print;
    private $best_seller;
    private $description;
    private $stock;
    private $active;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getPrint() {
        return $this->print;
    }

    public function setPrint($print) {
        $this->print = $print;
    }

    public function getBestSeller() {
        return $this->best_seller;
    }

    public function setBestSeller($best_seller) {
        $this->best_seller = $best_seller;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function imageGeneratorName() {
        return bin2hex(random_bytes(60)) . ".jpg";
    }

    public function setMoneyType($value) {
        return str_replace(",", ".", $value);
    }
}

interface ProductDAOInterface {
    public function buildProduct($data);
    public function create(Product $product);
    public function update(Product $product);
    public function contains_stock($id);
    public function getAllProduct($order);
    public function getIdToken();
}