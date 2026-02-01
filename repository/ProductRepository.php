<?php
require_once __DIR__ . "/../Database.php";


class ProductRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->startConnection();
    }

    public function getAllProducts()
    {
        $sql = "SELECT p.*,
                       u1.name AS created_by_name,
                       u2.name AS updated_by_name
                FROM products p
                LEFT JOIN users u1 ON p.created_by = u1.id
                LEFT JOIN users u2 ON p.updated_by = u2.id
                ORDER BY p.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProduct($title, $description, $price, $filePath, $fileType, $createdBy)
    {
        $sql = "INSERT INTO products (title, description, price, file_path, file_type, created_by)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description, $price, $filePath, $fileType, $createdBy]);
    }

    public function updateProduct($id, $title, $description, $price, $filePath, $fileType, $updatedBy)
    {
        if ($filePath === null && $fileType === null) {
            $sql = "UPDATE products
                    SET title = ?, description = ?, price = ?, updated_by = ?
                    WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$title, $description, $price, $updatedBy, $id]);
        }

        $sql = "UPDATE products
                SET title = ?, description = ?, price = ?, file_path = ?, file_type = ?, updated_by = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $description, $price, $filePath, $fileType, $updatedBy, $id]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
