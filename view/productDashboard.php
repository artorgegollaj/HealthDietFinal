<?php
session_start();
require_once __DIR__ . "/../repository/ProductRepository.php";



if (!isset($_SESSION["user_id"])) {
    header("Location: ../Projekti.php");
    exit;
}
if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ../Projektifq2.php");
    exit;
}

$repo = new ProductRepository();
$products = $repo->getAllProducts();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Products</title>
</head>
<body>

<h2>Admin Dashboard (Products)</h2>

<p>
    Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?> |
    <a href="../logout.php">Logout</a>
</p>

<p><a href="addProduct.php">Add Product</a></p>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>File</th>
        <th>Type</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php if (!$products || count($products) === 0): ?>
        <tr><td colspan="10">No products found.</td></tr>
    <?php else: ?>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><?php echo $p["id"]; ?></td>
                <td><?php echo htmlspecialchars($p["title"]); ?></td>
                <td><?php echo htmlspecialchars($p["description"]); ?></td>
                <td><?php echo htmlspecialchars($p["price"]); ?></td>
                <td>
                    <?php if (!empty($p["file_path"])): ?>
                        <a href="../<?php echo htmlspecialchars($p["file_path"]); ?>" target="_blank">Open</a>
                    <?php else: ?>
                        —
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($p["file_type"] ?? "—"); ?></td>
                <td><?php echo htmlspecialchars($p["created_by_name"] ?? "—"); ?></td>
                <td><?php echo htmlspecialchars($p["updated_by_name"] ?? "—"); ?></td>
                <td><a href="editProduct.php?id=<?php echo $p["id"]; ?>">Edit</a></td>
                <td><a href="deleteProduct.php?id=<?php echo $p["id"]; ?>" onclick="return confirm('Delete this product?');">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>
