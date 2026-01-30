<?php
require_once "Database.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $lastname = trim($_POST["lastname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $passRaw = $_POST["password"] ?? "";
    $confirm = $_POST["confirmpassword"] ?? "";

    if ($name === "" || $lastname === "" || $email === "" || $passRaw === "" || $confirm === "") {
        die("All fields are required");
    }

    if ($passRaw !== $confirm) {
        die("Passwords do not match");
    }

    $password = password_hash($passRaw, PASSWORD_DEFAULT);

    try {
        $db = new Database();
        $conn = $db->startConnection();

        $sql = "INSERT INTO users (name, email, password, role)
                VALUES (?, ?, ?, 'user')";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$name . " " . $lastname, $email, $password]);

        header("Location: login.php");
        exit;

    } catch (PDOException $e) {
        die("DB error: " . $e->getMessage());
    }
}
?>
