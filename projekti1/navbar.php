<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <img src="images/kacandolli-logo.png" alt="Kacandolli Logo" class="logo">
    <h1 class="navbar-title">DILER I AUTORIZUAR</h1>
    <div class="brand-logos">
        <img src="images/mercedes.png" alt="Mercedes Logo" class="brand-logo">
        <img src="images/suzuki.png" alt="Suzuki Logo" class="brand-logo">
        <img src="images/brp.png" alt="BRP Logo" class="brand-logo">
    </div>
    <div class="auth-buttons">
        <?php
        if (isset($_SESSION['perdoruesi'])) {
            // Logged in
            if ($_SESSION['perdoruesi']['perdoruesiid'] == 1) {
                echo '<a href="admin.php" class="admin-btn">Admin Panel</a>';
            }
            echo '<a href="logout.php" class="logout-btn">Logout</a>';
        } else {
            // Not logged in
            echo '<a href="login.php" class="login-btn">Login</a>';
            echo '<a href="signup.php" class="signup-btn">Sign Up</a>';
        }
        ?>
    </div>
</nav>
