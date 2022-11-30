<?php

require_once("../DAO/ProductDAO.php");
require_once("../models/Product.php");
require_once("../config/database.php");
require_once("../config/globals.php");

$product = new Product();
$productDao = new ProductDAO($conn, $BASE_URL);

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$type = $data["type"];
if(empty($type)) {
    $response = ["error"=>true, "msg"=>"Tipo requisitado para essa ação"];
    echo json_encode($response);
    return;
}


if($type === "create") {

    $product->setName($data["name"]);
    $product->setPrice($data["price"]);
    $product->setBestSeller($data["best_seller"]);
    $product->setActive($data["active"]);
    $product->setDescription($data["bio"]);
    $product->setStock($data["stock"]);


    $imgTypes = ["image/jpeg", "image/jpg", "image/png"];
    $jpgArray = ["image/jpeg", "image/jpg"];

    if(empty($data["name"]) || empty($data["price"])) {
        $response = ["error"=>true, "msg"=>"Campos obrigatórios => Nome e Preço"];
        echo json_encode($response);
        return;
    }

    // Criação da imagem do produto
    if(isset($_FILES["img"]) && !empty($_FILES["img"]["tmp_name"])) {
        $img = $_FILES["img"];

        if(!in_array($img["type"], $imgTypes)) {
            $response = ["error" => true, "msg" => "Tipo inválido de inserido, válidos -> jpeg, jpg, png"];
            echo json_encode($response);
            return;
        }

        if(in_array($img["type"], $imgTypes)) {
            // Verifica se a imagem é  jpg
            if(in_array($img, $jpgArray)) {
                $imageFile = imagecreatefromjpeg($img["tmp_name"]);
            }

            // Verifica se a imagem é png
            if(!in_array($img, $jpgArray)) {
                $imageFile = imagecreatefrompng($img["tmp_name"]);
            }
        }

        $imageName = $product->imageGeneratorName();

        imagejpeg($imageFile, "../src/img/products/".$imageName, 100);

        $product->setImage($imageName);
    }

    //Criação da estampa do produto
    if(isset($_FILES["print-img"]) && !empty($_FILES["print-img"]["tmp_name"])) {
        $print_img = $_FILES["print-img"];

        if(!in_array($print_img["type"], $imgTypes)) {
            $response = ["error" => true, "msg" => "Tipo inválido de inserido, válidos -> jpeg, jpg, png"];
            echo json_encode($response);
            return;
        }

        if(in_array($print_img["type"], $imgTypes)) {
            // Verifica se a imagem é  jpg
            if(in_array($print_img, $jpgArray)) {
                $printImageFile = imagecreatefromjpeg($print_img["tmp_name"]);
            }

            // Verifica se a imagem é png
            if(!in_array($print_img, $jpgArray)) {
                $printImageFile = imagecreatefrompng($print_img["tmp_name"]);
            }
        }

        $printImageName = $product->imageGeneratorName();

        imagejpeg($printImageFile, "../src/img/products/".$printImageName, 100);

        $product->setPrint($printImageName);
    }

    try {
        $productDao->create($product);
        $response = ["error" => false, "msg" => "Produto cadastrado com sucesso"];
        echo json_encode($response);
        return;
    } catch (Exception $e) {
        $response = ["error" => true, "msg" => $e];
        echo json_encode($response);
        return;
    }
}