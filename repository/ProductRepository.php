<?php

include_once '../interface/IProductRepository.php';
include_once '../databaseConnection/Database.php';
include_once '../model/Product.php';

class ProductRepository implements IProductRepository
{
    private $connection;

    public function __construct()
    {
        $db = new Database();                
        $this->connection = $db->startConnection();
    }

    public function insertProduct($product)
    {
        $conn = $this->connection;

        $sql = "INSERT INTO product (name, description, quantity, price)
                VALUES (:name, :description, :quantity, :price)";

        $statement = $conn->prepare($sql);

        $name = $product->getName();
        $description = $product->getDescription();
        $quantity = $product->getQuantity();
        $price = $product->getPrice();

        $statement->bindParam(':name', $name);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':price', $price);

        return $statement->execute();
    }

    public function getAllProducts()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM product ORDER BY id DESC";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getProductById($id = null)
    {
        if ($id === null) {
            return null;
        }

        $conn = $this->connection;

        $sql = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch();
    }

    public function updateProduct($id, $name, $description, $quantity, $price)
    {
        $conn = $this->connection;

        $sql = "UPDATE product
                SET name = :name,
                    description = :description,
                    quantity = :quantity,
                    price = :price
                WHERE id = :id";

        $statement = $conn->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':price', $price);

        return $statement->execute();
    }

    public function deleteProduct($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM product WHERE id = :id";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}

?>
