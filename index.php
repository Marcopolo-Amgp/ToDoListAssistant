<?php
require 'config/configuration.php';
require 'class/todo.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}


$todo = new Todo();
$todo = $todo->getAll($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="card">


    <div class="page-header">
        <h2>📋 My Todo List</h2>
        <div>
            <a href="create.php" class="btn btn-primary">+ Add Todo</a>
            <a href="auth/logout.php" class="btn btn-secondary" onclick="return confirmLogout()">Logout</a>
        </div>
    </div>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if (empty($todo)): ?>
        <tr>
            <td colspan="3" class="empty">Belum ada todo</td>
        </tr>
        <?php endif; ?>
        <?php foreach ($todo as $t): ?>
        <tr>
            <td><b><?= htmlspecialchars($t['title']) ?></b></td>
            <td><?= htmlspecialchars($t['description']) ?></td>
            <td>
                <span class="status <?= $t['status'] ?>">
                    <?= ucfirst($t['status']) ?>
                </span>
            </td>
            <td class="table-action">
                <a href="update.php?id=<?= $t['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $t['id'] ?>"> Delete </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<script src="js/app.js"></script>
</body>
