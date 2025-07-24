<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

require 'koneksi.php';

// Proses Simpan Formulir
if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $nama_nik = $_POST['nama_nik'];
    $bagian = $_POST['bagian'];

    mysqli_query($koneksi, "INSERT INTO formulir (tanggal, nama_nik, bagian) VALUES ('$tanggal', '$nama_nik', '$bagian')");
    $id_formulir = mysqli_insert_id($koneksi);

    $jumlah_barang = count($_POST['nama_barang']);

    for ($i = 0; $i < $jumlah_barang; $i++) {
        $nama_barang = $_POST['nama_barang'][$i];
        $spec = $_POST['spec'][$i];
        $unit = $_POST['unit'][$i];
        $qty = $_POST['qty'][$i];
        $keterangan = $_POST['keterangan'][$i];

        mysqli_query($koneksi, "INSERT INTO detail_formulir (id_formulir, nama_barang, spec, unit, qty, keterangan)
            VALUES ('$id_formulir', '$nama_barang', '$spec', '$unit', '$qty', '$keterangan')");
    }

    header("Location: formulir_user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Permintaan Barang - PT TAH SUNG HUNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background: #f1f4f7; padding: 20px; }
        h3 { font-weight: bold; }
        table input { font-size: 0.9rem; }
    </style>
</head>
<body>

<h3>PT TAH SUNG HUNG - Formulir Permintaan Barang</h3>

<form method="POST">
    <div class="mb-3 row">
        <div class="col">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="col">
            <label>Nama / NIK</label>
            <input type="text" name="nama_nik" class="form-control" required>
        </div>
        <div class="col">
            <label>Bagian</label>
            <input type="text" name="bagian" class="form-control" required>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Spec</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><input type="text" name="nama_barang[]" class="form-control"></td>
                    <td><input type="text" name="spec[]" class="form-control"></td>
                    <td><input type="text" name="unit[]" class="form-control"></td>
                    <td><input type="number" name="qty[]" class="form-control"></td>
                    <td><input type="text" name="keterangan[]" class="form-control"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <button type="submit" name="simpan" class="btn btn-success w-100">Simpan Formulir</button>
</form>

<hr>

<h4>Daftar Formulir Yang Pernah Diinput</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama / NIK</th>
            <th>Bagian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $formulir = mysqli_query($koneksi, "SELECT * FROM formulir ORDER BY tanggal DESC");
        while ($row = mysqli_fetch_assoc($formulir)) {
            echo "<tr>
                <td>{$row['tanggal']}</td>
                <td>{$row['nama_nik']}</td>
                <td>{$row['bagian']}</td>
                <td>
                    <a href='detail_formulir.php?id_formulir={$row['id_formulir']}' class='btn btn-info btn-sm'>Detail</a>
                    <a href='edit_formulir.php?id_formulir={$row['id_formulir']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_formulir.php?id_formulir={$row['id_formulir']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus formulir ini?')\">Hapus</a>
                    
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>
<a href="index.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>


</body>
</html>
