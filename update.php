<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data lama
$query = "SELECT * FROM tugas WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Proses update
if (isset($_POST['update'])) {
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi  = $_POST['deskripsi'];
    $status     = $_POST['status'];

    $update = "UPDATE tugas 
               SET nama_tugas='$nama_tugas',
                   deskripsi='$deskripsi',
                   status='$status'
               WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
</head>
<body>

<h2>Edit Tugas</h2>

<form method="POST">
    <label>Nama Tugas</label><br>
    <input type="text" name="nama_tugas" value="<?= $data['nama_tugas']; ?>" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required><?= $data['deskripsi']; ?></textarea><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Belum Selesai" <?= $data['status'] == 'Belum Selesai' ? 'selected' : '' ?>>Belum Selesai</option>
        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
