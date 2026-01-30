<?php
include_once '../models/Product.php';
include_once '../repository/ProductRepository.php';

if(isset($_POST['addBtn'])){
    $product = new Product(
        null,
        $_POST['name'],
        $_POST['description'],
        $_POST['quantity'],
        $_POST['price']
    );

    $repo = new ProductRepository();
    $repo->insertProduct($product);

    header("location: productDashboard.php");
}
?>

<form method="post">
  <input type="text" name="name" placeholder="Product name"> <br> <br>
  <textarea name="description" placeholder="Description"></textarea> <br> <br>
  <input type="number" name="quantity" placeholder="Quantity">
  <input type="number" name="price" placeholder="Price">
  <input type="submit" name="addBtn" value="Add Product">
</form>


