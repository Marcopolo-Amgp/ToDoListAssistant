<?php
require 'config/configuration.php';
require 'class/todo.php';

if (isset($_GET['id'])) {
    $todo = new Todo();
    $todo->delete($_GET['id']);
}

header("Location: index.php");
exit;
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

    <h2>Hapus ToDo</h2>

    <p>Apakah kamu yakin ingin menghapus ToDo ini?</p>

    <button>Ya, Hapus</button>
    <br><br>
    <a href="index.php">Batal</a>

</body>
</html>
