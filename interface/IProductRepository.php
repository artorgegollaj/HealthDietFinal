<?php

    interface IProductRepository{
        public function insertProduct($product);

        public function getAllProducts();

        public function getProductById();

        public function updateProduct($id,$name,$description,$quantity,$price);

        public function deleteProduct($id);
        
    }

?>