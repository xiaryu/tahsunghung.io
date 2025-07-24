<?php
require 'koneksi.php';

// Proses Simpan Data Barang Keluar
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $departement = $_POST['departement'];
    $remark = $_POST['remark'];

    mysqli_query($koneksi, "INSERT INTO barang_keluar (tanggal, nama_barang, jumlah, departement, remark) 
                            VALUES ('$tanggal', '$nama_barang', '$jumlah', '$departement', '$remark')");

    header("Location: barang_keluar.php");
    exit();
}

// Proses Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM barang_keluar WHERE id_keluar='$id'");
    header("Location: barang_keluar.php");
    exit();
}

// Ambil Data Barang Keluar
$data = mysqli_query($koneksi, "SELECT * FROM barang_keluar ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barang Keluar - PT TSH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Poppins, sans-serif; background: #f5f6fa; }
        h3 { font-weight: 700; }
        .btn { font-weight: 500; }
        .card { border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        table { font-size: 0.9rem; }
    </style>
</head>
<body class="p-4">

<h3>Barang Keluar - PT Tah Sung Hung</h3>

<div class="card p-4 mb-4">
    <h5 class="mb-3">Tambah Barang Keluar</h5>
    <form method="POST">
        <div class="row mb-3">
            <div class="col">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="col">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="col">
                <label>QTY</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Departement</label>
                <input type="text" name="departement" class="form-control" required>
            </div>
            <div class="col">
                <label>Remark / Keterangan</label>
                <input type="text" name="remark" class="form-control">
            </div>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan Data</button>
    </form>
</div>

<div class="card p-4">
    <h5>Data Barang Keluar</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>QTY</th>
                <th>Departement</th>
                <th>Remark</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['departement'] ?></td>
                    <td><?= $row['remark'] ?></td>
                    <td>
                        <a href="edit_barang_keluar.php?id=<?= $row['id_keluar'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="barang_keluar.php?hapus=<?= $row['id_keluar'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
