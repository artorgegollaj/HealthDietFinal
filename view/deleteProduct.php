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

$id = $_GET["id"] ?? null;
if ($id !== null) {
    $repo = new ProductRepository();
    $repo->deleteProduct($id);
}

header("Location: productDashboard.php");
exit;
