<?php
include 'koneksi.php';

$id = $_GET['id_keluar'];

// Ambil data berdasarkan ID
$data = mysqli_query($koneksi, "SELECT * FROM barang_keluar WHERE id_keluar='$id'");
$barang = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $nama_barang = $_POST['nama_barang'];
    $departement = $_POST['departement'];
    $remark = $_POST['remark'];

    mysqli_query($koneksi, "UPDATE barang_keluar SET 
        tanggal='$tanggal', 
        nama_barang='$nama_barang', 
        departement='$departement', 
        remark='$remark' 
        WHERE id_keluar='$id'
    ");

    header("Location: barang_keluar.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Edit Barang Keluar</h3>
    <form method="POST">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $barang['tanggal'] ?>" class="form-control mb-2" required>

        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>" class="form-control mb-2" required>

        <label>Departement:</label>
        <input type="text" name="departement" value="<?= $barang['departement'] ?>" class="form-control mb-2" required>

        <label>Remark:</label>
        <input type="text" name="remark" value="<?= $barang['remark'] ?>" class="form-control mb-2" required>

        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
        <a href="barang_keluar.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
