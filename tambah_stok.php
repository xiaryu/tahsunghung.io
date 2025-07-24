<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {
    $code = $_POST['code'];
    $item = $_POST['item'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "INSERT INTO stok_barang (code, item, tanggal, jumlah)
                            VALUES ('$code', '$item', '$tanggal', '$jumlah')");
    header("Location: dashboard_stok.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h3>Tambah Stok Barang</h3>

    <form method="POST">
        <input type="text" name="code" class="form-control mb-2" placeholder="Code" required>
        <input type="text" name="item" class="form-control mb-2" placeholder="Item" required>
        <input type="date" name="tanggal" class="form-control mb-2" required>
        <input type="number" name="jumlah" class="form-control mb-2" placeholder="Jumlah" required>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="dashboard_stok.php" class="btn btn-secondary">Kembali</a>
    </form>

</body>
</html>
