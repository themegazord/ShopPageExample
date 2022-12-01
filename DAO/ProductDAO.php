<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . "/shop_page/models/Product.php");
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . "/shop_page/config/database.php");

class ProductDAO implements ProductDAOInterface {

    private $conn;
    private $url;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
    }

    public function buildProduct($data)
    {
        $product = new Product();

        $product->setId($data["id_product"]);
        $product->setName($data["product_name"]);
        $product->setPrice($data["product_price"]);
        $product->setImage($data["product_image"]);
        $product->setPrint($data["product_print"]);
        $product->setBestSeller($data["product_best_seller"]);
        $product->setDescription($data["product_description"]);
        $product->setStock($data["product_stock"]);

        return $product;

    }

    public function create(Product $product)
    {
        $product_name = $product->getName();
        $product_price = $product->getPrice();
        $product_image = $product->getImage();
        $product_print = $product->getPrint();
        $product_best_seller = $product->getBestSeller();
        $product_description = $product->getDescription();
        $product_stock = $product->getStock();
        $product_active = $product->getActive();

        $stmt = $this->conn->prepare(
            "
            INSERT INTO products
                (product_name, product_price, product_image, product_print, product_best_seller, product_description, product_stock, active)
            VALUES
                (:product_name, :product_price, :product_image, :product_print, :product_best_seller, :product_description, :product_stock, :product_active);
            "
        );

        $stmt->bindParam(":product_name", $product_name);
        $stmt->bindParam(":product_price", $product_price);
        $stmt->bindParam(":product_image", $product_image);
        $stmt->bindParam(":product_print", $product_print);
        $stmt->bindParam(":product_best_seller", $product_best_seller);
        $stmt->bindParam(":product_description", $product_description);
        $stmt->bindParam(":product_stock", $product_stock);
        $stmt->bindParam(":product_active", $product_active);

        $stmt->execute();
    }

    public function update(Product $product)
    {
        $id_product = $product->getId();
        $product_name = $product->getName();
        $product_price = $product->getPrice();
        $product_image = $product->getImage();
        $product_print = $product->getPrint();
        $product_best_seller = $product->getBestSeller();
        $product_description = $product->getDescription();
        $product_stock = $product->getStock();
        $product_active = $product->getActive();

        $stmt = $this->conn->prepare(
            "
            UPDATE products SET
                product_name = :product_name,
                product_price = :product_price,
                product_image = :product_image,
                product_print = :product_print,
                product_best_seller = :product_best_seller,
                product_description = :product_description,
                product_stock = :product_stock
                active = :product_active
            WHERE
                id_product = :id_product
            "
        );

        $stmt->bindParam(":id_product", $id_product);
        $stmt->bindParam(":product_name", $product_name);
        $stmt->bindParam(":product_price", $product_price);
        $stmt->bindParam(":product_image", $product_image);
        $stmt->bindParam(":product_print", $product_print);
        $stmt->bindParam(":product_best_seller", $product_best_seller);
        $stmt->bindParam(":product_description", $product_description);
        $stmt->bindParam(":product_stock", $product_stock);
        $stmt->bindParam(":product_active", $product_active);

        $stmt->execute();
    }


    public function contains_stock($id): bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id_product = :id_product AND product_stock > 0");
        $stmt->bindParam(":id_product", $id);
        $stmt->execute();

        if($stmt->rowCount() === 0) {
            return false;
        }

        return true;
    }

    public function getIdToken()
    {
        return $_SESSION["id_product"];
    }

    public function getAllProduct($order): array
    {
        $products = [];

        $stmt = $this->conn->query("SELECT * FROM products ORDER BY id_product " . "$order");

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $productsArray = $stmt->fetchAll();

            foreach($productsArray as $product) {
                $products[] = $this->buildProduct($product);
            }
        }

        return $products;
    }
}