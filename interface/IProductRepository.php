<?php

interface IProductRepository
{
    public function getAllProducts();

    public function getProductById($id);

    public function insertProduct($title, $description, $price, $filePath, $fileType, $createdBy);

    public function updateProduct($id, $title, $description, $price, $filePath, $fileType, $updatedBy);

    public function deleteProduct($id);
}
