<?php
require_once '../config/configuration.php';
require_once '../class/user.php';


$user = new User();
$error = '';
$success = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        empty($_POST['username']) ||
        empty($_POST['email']) ||
        empty($_POST['password'])
    ) {
        $error = "All fields are required!";
    } else {
        $result = $user->register($_POST);


        if ($result === true) {
            $success = "Register successful. Please login.";
        } else {
            $error = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


<div class="auth-container">
    <h2>📝 Create Account</h2>


    <?php if ($error): ?>
        <div class="alert error"><?= $error ?></div>
    <?php endif; ?>


    <?php if ($success): ?>
        <div class="alert success"><?= $success ?></div>
    <?php endif; ?>


    <form method="POST" id="registerForm">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required placeholder="Enter your username">
        </div>
       
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required placeholder="Enter your email">
        </div>
       
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="Enter your password">
        </div>


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="auth-link">
        Already have an account? <a href="login.php">Login</a>
    </p>
</div>
<script src="../js/app.js"></script>
<script>
    validateForm("registerForm");
</script>
</body>
</html>

