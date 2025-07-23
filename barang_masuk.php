<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

// Tambah Data
if (isset($_POST['tambah'])) {
    $id_masuk = uniqid('MSK');
    $tanggal = $_POST['tanggal'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['tipe'];
    $supplier = $_POST['supplier'];

    mysqli_query($koneksi, "INSERT INTO barang_masuk 
    (id_masuk, tanggal, nama_barang, jumlah, keterangan, supplier)
    VALUES 
    ('$id_masuk', '$tanggal', '$nama_barang', '$jumlah', '$keterangan', '$supplier')");

    header("Location: barang_masuk.php");
    exit();
}

// Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM barang_masuk WHERE id_masuk='$id'");
    header("Location: barang_masuk.php");
    exit();
}

// Ambil Data
$data = mysqli_query($koneksi, "SELECT * FROM barang_masuk ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barang Masuk - PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f1f4f9; font-family: Poppins, sans-serif; }
        h3 { font-weight: 700; color: #333; }
        .card { border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        table { font-size: 0.95rem; }
        .btn-primary { background-color: #003366; border: none; }
        .btn-primary:hover { background-color: #001d4a; }
        .btn-danger { background-color: #ff4d4d; }
        .btn-danger:hover { background-color: #e60000; }
        .btn-warning { background-color: #f1c40f; color: #000; }
        .btn-warning:hover { background-color: #d4ac0d; color: #000; }
    </style>
</head>
<body class="p-4">

<div class="container">
    <h3 class="mb-4">Barang Masuk - PT Tah Sung Hung</h3>

    <div class="card p-4 mb-4">
        <h5 class="mb-3">Tambah Barang Masuk</h5>
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
                    <label>Type / Keterangan</label>
                    <input type="text" name="tipe" class="form-control" required>
                </div>
                <div class="col">
                    <label>Supplier</label>
                    <input type="text" name="supplier" class="form-control" required>
                </div>
            </div>

            <button type="submit" name="tambah" class="btn btn-primary w-100">Simpan Data</button>
        </form>
    </div>

    <div class="card p-4">
        <h5>Data Barang Masuk</h5>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Item</th>
                    <th>QTY</th>
                    <th>Type</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td><?= $row['supplier'] ?></td>
                    <td>
                        <a href="edit_barang_masuk.php?id=<?= $row['id_masuk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="barang_masuk.php?hapus=<?= $row['id_masuk'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
