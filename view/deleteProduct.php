<?php
include_once '../repository/ProductRepository.php';

$repo = new ProductRepository(); 
$repo->deleteProduct($_GET['id']); 

header("location: productDashboard.php");
?>