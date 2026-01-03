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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="card">
    <div class="page-header">
        <h2>➕ Tambah ToDo</h2>
        <a href="index.php" class="btn btn-secondary">← Kembali</a>
    </div>


    <form method="POST" data-lock-submit onsubmit="return validateTodo()">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" required placeholder="Masukkan judul todo">
        </div>
       
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" placeholder="Masukkan deskripsi (opsional)"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Simpan Todo</button>
    </form>
</div>
<script src="js/app.js"></script>
</body>
</html>

