<?php
require 'config/configuration.php';
require 'class/todo.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todo = new Todo();
    $todo->create($_POST, $_SESSION['user_id']);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Create ToDo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h2>Tambah ToDo</h2>

    <form>
        <form method="post">
    <label>Judul</label>
    <input type="text" name="title" required>

    <label>Deskripsi</label>
    <textarea name="description"></textarea>

    <button type="submit">Simpan</button>
</form>

    <br>
    <a href="index.php">← Kembali</a>

</body>
</html>
