<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

if (!isset($_GET['id'])) {
    header("Location: barang_masuk.php");
    exit();
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM barang_masuk WHERE id_masuk='$id'"));

// Handle Update
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['tipe'];
    $supplier = $_POST['supplier'];

    mysqli_query($koneksi, "UPDATE barang_masuk SET 
        tanggal='$tanggal',
        nama_barang='$nama_barang',
        jumlah='$jumlah',
        keterangan='$keterangan',
        supplier='$supplier'
        WHERE id_masuk='$id'");

    header("Location: barang_masuk.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">

<div class="container">
    <h3>Edit Data Barang Masuk</h3>
    <div class="card p-4 mt-4">
        <form method="POST">
            <div class="row mb-3">
                <div class="col">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
                </div>
                <div class="col">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?= $data['nama_barang'] ?>" required>
                </div>
                <div class="col">
                    <label>QTY</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah'] ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Type / Keterangan</label>
                    <input type="text" name="tipe" class="form-control" value="<?= $data['keterangan'] ?>" required>
                </div>
                <div class="col">
                    <label>Supplier</label>
                    <input type="text" name="supplier" class="form-control" value="<?= $data['supplier'] ?>" required>
                </div>
            </div>

            <button type="submit" name="update" class="btn btn-primary w-100">Simpan Perubahan</button>
            <a href="barang_masuk.php" class="btn btn-secondary w-100 mt-2">Batal</a>
        </form>
    </div>
</div>

</body>
</html>
