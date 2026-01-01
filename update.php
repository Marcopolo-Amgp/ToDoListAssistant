<?php
require 'config/configuration.php';
require 'class/todo.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

$todo = new Todo();
$data = $todo->getById($_GET['id']);

if (isset($_POST['submit'])) {
    $todo->update($_POST);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
</head>
<body>

<h2>Edit Todo</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <label>Title</label><br>
    <input type="text" name="title" value="<?= $data['title'] ?>" required><br><br>

    <label>Description</label><br>
    <textarea name="description"><?= $data['description'] ?></textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $data['status']=='pending'?'selected':'' ?>>Pending</option>
        <option value="completed" <?= $data['status']=='completed'?'selected':'' ?>>Completed</option>
    </select><br><br>

    <button type="submit" name="submit">Update</button>
    <a href="index.php">Cancel</a>
</form>

</body>
</html>
