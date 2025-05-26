<?php
include 'inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emri = $_POST['name'];
    $email = $_POST['email'];
    $fjalekalimi = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!$emri || !$email || !$fjalekalimi || !$confirm_password) {
        echo "Të gjitha fushat janë të detyrueshme.";
    } elseif ($fjalekalimi !== $confirm_password) {
        echo "Fjalëkalimet nuk përputhen.";
    } else {
        signup($emri, $email, $fjalekalimi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Auto Kacandolli</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <!-- Navbar and other HTML structure as before -->

    <nav class="navbar">
        <img src="images/kacandolli-logo.png" alt="Kacandolli Logo" class="logo">
        <h1 class="navbar-title">DILER I AUTORIZUAR</h1>
        <div class="brand-logos">
            <img src="images/mercedes.png" alt="Mercedes Logo" class="brand-logo">
            <img src="images/suzuki.png" alt="Suzuki Logo" class="brand-logo">
            <img src="images/brp.png" alt="BRP Logo" class="brand-logo">
        </div>
        <div class="auth-buttons">
            <a href="login.php" class="login-btn">Login</a>
            <a href="signup.php" class="signup-btn">Sign Up</a>
        </div>
    </nav>

    <ul class="nav">
        <li><a href="index.html">HOME</a></li>
        <li><a href="#sherbimet">SHERBIMET</a></li>
        <li><a href="dyqani.php">VETURAT NE SHITJE</a></li>
        <li><a href="about.php">RRETH NESH</a></li>
    </ul>

    <div class="auth-div">
        <div class="auth-box">
            <h2>SIGN UP</h2>
            <form action="signup.php" method="post" class="auth-form">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="auth-submit">Sign Up</button>
            </form>
            <p class="auth-link">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
