<?php
require 'config/config.php';
require 'class/Todo.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $todo = new Todo();
    $todo->create($_POST, $_SESSION['user_id']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Todo</title>
</head>
<body>

<h2>Add New Todo</h2>

<form method="POST">
    <label>Title</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit" name="submit">Save</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
