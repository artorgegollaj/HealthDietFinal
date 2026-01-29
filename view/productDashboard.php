<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard</title>
</head>
<body>
    <h2>Products</h2>
    <a href="addProduct.php">add Products</a>
    <table border = "1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>quantity</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        include_once '../repository/ProductRepository.php';

        $productRepository = new ProductRepository();
        $products = $productRepository->getAllProducts();

        if ($products && count($products) > 0) {
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . $product['id'] . "</td>";
                echo "<td>" . $product['name'] . "</td>";
                echo "<td>" . $product['description'] . "</td>";
                echo "<td>" . $product['quantity'] . "</td>";
                echo "<td>" . $product['price'] . "</td>";

                echo "<td><a href='editProduct.php?id=" . $product['id'] . "'>Edit</a></td>";
                echo "<td><a href='deleteProduct.php?id=" . $product['id'] . "'>Delete</a></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No products found.</td></tr>";
        }
        ?>
    </table>
    
</body>
</html>