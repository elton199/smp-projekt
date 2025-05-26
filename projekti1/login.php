  <?php
    require_once 'inc/functions.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['Email'];
        $fjalekalimi = $_POST['Fjalekalimi'];

        if (!empty($email) && !empty($fjalekalimi)) {
            login($email, $fjalekalimi);
        } else {
            echo "Të gjitha fushat janë të detyrueshme.";
        }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Auto Kacandolli</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="auth.css">
</head>
<body>
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
        <li><a href="index.php">HOME</a></li>
        <li><a href="#sherbimet">SHERBIMET</a></li>
        <li><a href="dyqani.php">VETURAT NE SHITJE</a></li>
        <li><a href="about.php">RRETH NESH</a></li>
    </ul>

    <div class="auth-div">
        <div class="auth-box">
            <h2>LOGIN</h2>
            <form action="login.php" method="post" class="auth-form">
                <div class="form-group">
                    <input type="email" name="Email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="Fjalekalimi" placeholder="Fjalekalimi" required>
                </div>
                <button type="submit" class="auth-submit">Login</button>
            </form>
            <p class="auth-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>