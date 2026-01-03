<?php
require_once __DIR__ . '/../config/configuration.php';
require_once __DIR__ . '/../class/user.php';


if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}


$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();


    if ($user->login($_POST)) {
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Email or password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="auth-container">
    <h2>🔐 Login</h2>
    <?php if ($error): ?>
        <div class="auth-error"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="POST" id="loginForm">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter your password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="auth-footer">
        <p>Don't have an account?
            <a href="register.php">Register here</a>
        </p>
    </div>
</div>
<script src="../js/app.js"></script>
<script>
    validateForm("formId");
</script>    
</body>
</html>