<?php
require 'config/config.php';
require 'class/Todo.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

if (isset($_POST['confirm'])) {
    $todo = new Todo();
    $todo->delete($_POST['id']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Todo</title>
</head>
<body>

<h2>Delete Confirmation</h2>
<p>Are you sure you want to delete this todo?</p>

<form method="POST">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <button type="submit" name="confirm">Yes, Delete</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
