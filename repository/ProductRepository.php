<?php

include_once '../interface/IProductRepository.php';
include_once '../databaseConnection/Database.php';

class ProductRepository implements IProductRepository
{
    private $connection;

    function __construct()
    {
        $conn=new DatabaseConnection;

    }

    public function insertProduct($product){
        $conn=$this->connection;

        $sql="INSERT INTO product (name,description,quantity,price)
        VALUES ()"
    }
}

?>