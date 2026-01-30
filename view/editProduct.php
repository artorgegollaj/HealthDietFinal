<?php

include_once '../repository/ProductRepository.php';

$repo = new ProductRepository();
$product = $repo->getProductById($_GET['id']);

if (isset($_POST['editBtn'])) {
    $repo->updateProduct(
        $product['id'],
        $_POST['name'],
        $_POST['description'],
        $_POST['quantity'],
        $_POST['price']
    );

    header("location: productDashboard.php");
}

?>
<form method="post">
    <input type="text" name="name" value="<?= $product['name'] ?>"> <br><br>

    <textarea name="description"><?= $product['description'] ?></textarea> <br><br>

    <input type="number" name="price" value="<?= $product['price'] ?>">

    <input type="number" name="quantity" value="<?= $product['quantity'] ?>">

    <input type="submit" name="editBtn" value="Save">
</form>