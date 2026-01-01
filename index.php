<?php
require 'config/config.php';
require 'class/Todo.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

$todo = new Todo();
$todos = $todo->getAll($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>My Todo List</h2>

<a href="create.php">+ Add Todo</a>
<a href="auth/logout.php" style="float:right;">Logout</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php foreach ($todos as $t): ?>
    <tr>
        <td><?= htmlspecialchars($t['title']) ?></td>
        <td><?= $t['status'] ?></td>
        <td>
            <a href="update.php?id=<?= $t['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $t['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
