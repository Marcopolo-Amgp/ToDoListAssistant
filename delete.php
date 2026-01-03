<?php
require 'config/configuration.php';
require 'class/todo.php';


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}


$todo = new Todo();
$data = $todo->getById($_GET['id']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todo->delete($_POST['id']);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Delete ToDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="delete-box">
    <h2>⚠️ Delete Todo</h2>
    <p>Are you sure you want to delete:</p>
    <strong><?= htmlspecialchars($data['title']) ?></strong>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Yes, Delete</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="js/app.js"></script>
</body>
