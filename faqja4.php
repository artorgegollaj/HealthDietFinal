<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Health And Diet</title>
    <link rel="stylesheet" href="assets/css/signup.css">
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

<div class="Signup">
    <h1>Sign Up</h1>
    <p class="info">Please give your information to continue!</p>

    <form id="signup" action="signup.php" method="POST">
        <input type="text" id="name" name="name" placeholder="First Name" required>
        <p id="nameError" style="color:red; font-size:14px;"></p>

        <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
        <p id="lastNameError" style="color:red; font-size:14px;"></p>

        <input type="text" id="height" name="height" placeholder="Height" required>
        <p id="heightError" style="color:red; font-size:14px;"></p>

        <input type="text" id="weight" name="weight" placeholder="Weight" required>
        <p id="weightError" style="color:red; font-size:14px;"></p>

        <input type="email" id="email" name="email" placeholder="Email" required>
        <p id="emailError" style="color:red; font-size:14px;"></p>

        <input type="password" id="password" name="password" placeholder="Password" required>
        <p id="passError" style="color:red; font-size:14px;"></p>

        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
        <p id="cpassError" style="color:red; font-size:14px;"></p>

        <div class="remember">
            <input type="checkbox" id="rememberMe" name="rememberMe">
            <label for="rememberMe">Remember Me</label>
        </div>

        <button type="submit" class="signupb" name="signupBtn">Sign Up</button>
    </form>
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

<script src="assets/js/signup.js"></script>
</body>
</html>