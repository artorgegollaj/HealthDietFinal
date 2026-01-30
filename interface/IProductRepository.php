<?php

interface IProductRepository {
    public function insertProduct($product, $createdBy = null);

    public function getAllProducts();

    public function getProductById($id = null);

    public function updateProduct($id, $name, $description, $quantity, $price, $updatedBy = null);

    public function deleteProduct($id);
}

?>
