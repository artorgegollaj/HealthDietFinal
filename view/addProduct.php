<?php
session_start();
require_once "../repository/ProductRepository.php";


if (!isset($_SESSION["user_id"])) {
    header("Location: ../Projekti.php");
    exit;
}
if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: ../Projektifq2.php");
    exit;
}

$error = "";

function saveUploadedFile($file)
{
    if (!isset($file) || $file["error"] !== UPLOAD_ERR_OK) {
        return [null, null];
    }

    $allowedImage = ["image/jpeg", "image/png", "image/webp"];
    $allowedPdf = ["application/pdf"];

    $mime = mime_content_type($file["tmp_name"]);

    if (in_array($mime, $allowedImage)) {
        $type = "image";
        $ext = ($mime === "image/png") ? "png" : (($mime === "image/webp") ? "webp" : "jpg");
    } elseif (in_array($mime, $allowedPdf)) {
        $type = "pdf";
        $ext = "pdf";
    } else {
        return [false, false];
    }

    // Save in HealthDietFinal/uploads (NOT view/uploads)
    $uploadDir = dirname(__DIR__) . "/uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filename = uniqid("file_", true) . "." . $ext;
    $absolutePath = $uploadDir . $filename;

    if (!move_uploaded_file($file["tmp_name"], $absolutePath)) {
        return [false, false];
    }

    // Path stored in DB (relative to project root)
    $relativePath = "uploads/" . $filename;

    return [$relativePath, $type];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $price = trim($_POST["price"] ?? "");

    if ($title === "" || $description === "" || $price === "") {
        $error = "All fields are required.";
    } elseif (!is_numeric($price) || $price < 0) {
        $error = "Price must be a valid number.";
    } else {
        [$filePath, $fileType] = saveUploadedFile($_FILES["file"] ?? null);

        if ($filePath === false) {
            $error = "Only JPG/PNG/WEBP images or PDF files are allowed.";
        } else {
            $repo = new ProductRepository();
            $repo->insertProduct($title, $description, $price, $filePath, $fileType, $_SESSION["user_id"]);
            header("Location: productDashboard.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
<h2>Add Product</h2>
<p><a href="productDashboard.php">Back</a> | <a href="../logout.php">Logout</a></p>

<?php if ($error !== ""): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Image or PDF (optional)</label><br>
    <input type="file" name="file" accept=".jpg,.jpeg,.png,.webp,.pdf"><br><br>

    <button type="submit">Add</button>
</form>
</body>
</html>
