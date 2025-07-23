<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

// Proses simpan data baru
if (isset($_POST['simpan'])) {
    $tanggal   = $_POST['tanggal'];
    $nama_nik  = $_POST['nama_nik'];
    $bagian    = $_POST['bagian'];
    $no_po     = $_POST['no_po'];
    $art       = $_POST['art'];
    $qty       = $_POST['qty'];
    $jenis     = $_POST['jenis'];

    mysqli_query($koneksi, "INSERT INTO bon_permintaan_barang (tanggal, nama_nik, bagian, no_po, art, qty, jenis)
        VALUES ('$tanggal', '$nama_nik', '$bagian', '$no_po', '$art', '$qty', '$jenis')");

    header("Location: bon_permintaan_barang.php");
    exit();
}

// Ambil daftar bon
$daftar_bon = mysqli_query($koneksi, "SELECT * FROM bon_permintaan_barang ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bon Permintaan Barang - PT TSH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background: #f1f4f7; padding: 20px; }
        .card { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h3 { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h3 class="mb-4">Bon Permintaan Barang</h3>

    <!-- Form Tambah Bon -->
    <div class="card mb-4">
        <form method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Nama / NIK</label>
                    <input type="text" name="nama_nik" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Bagian / Cell</label>
                    <input type="text" name="bagian" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label>No PO</label>
                    <input type="text" name="no_po" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>ART</label>
                    <input type="text" name="art" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>QTY</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Jenis</label>
                    <input type="text" name="jenis" class="form-control" required>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-success w-100 mt-3">Simpan Bon</button>
        </form>
    </div>

    <!-- Daftar Bon -->
    <div class="card">
        <h5>Daftar Bon Permintaan Barang</h5>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama / NIK</th>
                    <th>Bagian</th>
                    <th>No PO</th>
                    <th>ART</th>
                    <th>QTY</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($daftar_bon)) { ?>
                <tr>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['nama_nik'] ?></td>
                    <td><?= $row['bagian'] ?></td>
                    <td><?= $row['no_po'] ?></td>
                    <td><?= $row['art'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
                     <a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
