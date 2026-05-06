<?php
session_start();
require_once "Database.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        try {
            $db = new Database();
            $conn = $db->startConnection();

            if ($conn === null) {
                $error = "Database connection failed.";
            } else {
                $sql = "SELECT id, name, email, password, role FROM users WHERE email = ? LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$user) {
                    $error = "Email not found.";
                } elseif (!password_verify($password, $user["password"])) {
                    $error = "Wrong password.";
                } else {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["user_name"] = $user["name"];
                    $_SESSION["user_email"] = $user["email"];
                    $_SESSION["user_role"] = $user["role"];

                    if ($user["role"] === "admin") {
                        header("Location: view/productDashboard.php");
                        exit;
                    } else {
                        header("Location: Projektifq2.php");
                        exit;
                    }
                }
            }
        } catch (PDOException $e) {
            $error = "DB error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health And Diet</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<header class="header">
    <div class="logo"><img src="assets/images/Logo1.png" alt="logo"></div>
    <nav class="nav">
        <a href="Projektifq2.php">Workouts</a>
        <a href="faqja3.php">Programs</a>
        <a href="#">Healthy Living</a>
        <a href="#">About</a>
        <a href="#">Membership</a>
    </nav>
</header>

<div class="Login">
    <h1>Log In</h1>
    <p class="info">Please give your information to continue!</p>

    <?php if ($error !== ""): ?>
        <p class="errorMsg"><?php echo $error; ?></p>
    <?php endif; ?>

    <form id="login" method="POST" action="Projekti.php">
        <input type="email" id="email" name="email" placeholder="Email" required>
        <p id="emailError" class="fieldError"></p>

        <input type="password" id="password" name="password" placeholder="Password" required>
        <p id="passError" class="fieldError"></p>

        <div class="remember">
            <div class="remember-left">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember Me</label>
            </div>
            <a class="forgot" href="#">Forgot Password?</a>
        </div>

        <button type="submit" class="signinb">Sign In</button>
    </form>

    <p class="bottomText">
        Dont have an account?
        <a class="forgot" href="faqja4.php">Create One</a>
    </p>
</div>

<footer class="footer">
    <div class="content">
        <p>© 2025 Health And Diet. All rights reserved.</p>
        <div class="links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
</footer>

<script src="assets/js/login.js"></script>
</body>
</html>
