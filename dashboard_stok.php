<?php
require 'koneksi.php';

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM stok_barang WHERE id='$id'");
    header("Location: dashboard_stok.php");
}

// Ambil data
$data = mysqli_query($koneksi, "SELECT * FROM stok_barang ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h3>Stok Barang</h3>
    <a href="tambah_stok.php" class="btn btn-primary mb-3">Tambah Barang</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Code</th>
                <th>Item</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $row['code'] ?></td>
                <td><?= $row['item'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>
                    <a href="edit_stok.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="dashboard_stok.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
