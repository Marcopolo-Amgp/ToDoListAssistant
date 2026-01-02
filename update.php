<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="card">
    <div class="page-header">
        <h2>✏️ Edit Todo</h2>
        <a href="index.php" class="btn btn-secondary">← Back</a>
    </div>


    <form method="POST" onsubmit="return validateTodo()">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
       
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required>
            <div class="error-message"></div>
        </div>
       
        <div class="form-group">
            <label>Description</label>
            <textarea name="description"><?= htmlspecialchars($data['description']) ?></textarea>
            <div class="error-message"></div>
        </div>
       
        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="pending" <?= $data['status']=='pending'?'selected':'' ?>>Pending</option>
                <option value="completed" <?= $data['status']=='completed'?'selected':'' ?>>Completed</option>
            </select>
            <div class="error-message"></div>
        </div>


        <button type="submit" name="submit" class="btn btn-primary">
            Update Todo
        </button>
    </form>
</div>
<script src="js/app.js"></script>
<script>
    validateForm("updateTodoForm");
</script>
</body>
</html>
