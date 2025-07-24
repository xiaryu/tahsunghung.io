<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'koneksi.php';

// Ambil ID BON dari URL
if (!isset($_GET['id_bon'])) {
    echo "ID BON tidak ditemukan!";
    exit();
}

$id_bon = $_GET['id_bon'];

// Proses update
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $cell = $_POST['cell'];
    $no_po = $_POST['no_po'];
    $art = $_POST['art'];
    $component = $_POST['component'];
    $qty = $_POST['qty'];
    $bon_out = $_POST['bon_out'];
    $remark = $_POST['remark'];

    mysqli_query($koneksi, "UPDATE auto_cut SET 
        tanggal='$tanggal',
        cell='$cell',
        no_po='$no_po',
        art='$art',
        component='$component',
        qty='$qty',
        bon_out='$bon_out',
        remark='$remark'
        WHERE id_bon='$id_bon'");

    header("Location: auto_cut.php");
    exit();
}

// Ambil data berdasarkan id_bon
$data = mysqli_query($koneksi, "SELECT * FROM auto_cut WHERE id_bon='$id_bon'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Auto Cut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h3>Edit Auto Cut - <?= htmlspecialchars($id_bon) ?></h3>

<div class="card p-4">
    <form method="POST">
        <div class="mb-3">
            <label>ID BON (Tidak Bisa Diubah)</label>
            <input type="text" name="id_bon" class="form-control" value="<?= $row['id_bon'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Cell</label>
            <input type="text" name="cell" class="form-control" value="<?= $row['cell'] ?>" required>
        </div>
        <div class="mb-3">
            <label>No PO</label>
            <input type="text" name="no_po" class="form-control" value="<?= $row['no_po'] ?>" required>
        </div>
        <div class="mb-3">
            <label>ART</label>
            <input type="text" name="art" class="form-control" value="<?= $row['art'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Component</label>
            <input type="text" name="component" class="form-control" value="<?= $row['component'] ?>" required>
        </div>
        <div class="mb-3">
            <label>QTY</label>
            <input type="number" name="qty" class="form-control" value="<?= $row['qty'] ?>" required>
        </div>
        <div class="mb-3">
            <label>BON OUT</label>
            <input type="text" name="bon_out" class="form-control" value="<?= $row['bon_out'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Remark</label>
            <input type="text" name="remark" class="form-control" value="<?= $row['remark'] ?>">
        </div>

        <button type="submit" name="update" class="btn btn-primary w-100">Update Data</button>
    </form>

    <a href="auto_cut.php" class="btn btn-secondary mt-3">Kembali</a>
</div>

</body>
</html>
