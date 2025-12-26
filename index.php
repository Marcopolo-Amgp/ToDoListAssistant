<?php
include 'koneksi.php';

$query = "SELECT * FROM tugas ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
</head>
<body>

<h2>Daftar Tugas</h2>

<a href="create.php">+ Tambah Tugas</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Tugas</th>
        <th>Deskripsi</th>
        <th>Status</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_tugas'] ?></td>
            <td><?= $row['deskripsi'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><a href="update.php?id=<?= $row['id']; ?>">Edit</a></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
