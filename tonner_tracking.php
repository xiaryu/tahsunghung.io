<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

// Ambil data stok tonner
$data = mysqli_query($koneksi, "SELECT * FROM tonner_tracking ORDER BY department ASC");

// Ambil data history penggunaan tonner
$history = mysqli_query($koneksi, "SELECT * FROM tonner_usage ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tonner Tracking PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Poppins, sans-serif; background-color: #f8f9fa; }
        h2 { font-weight: bold; }
        table { font-size: 0.85rem; }
        .btn-add { margin-bottom: 15px; }
        .table-responsive { max-height: 600px; overflow-y: auto; }
    </style>
</head>
<body class="p-4">

    <h2>Tonner Tracking PT Tah Sung Hung</h2>

    <a href="tambah_tonner.php" class="btn btn-primary btn-add">Tambah Data Tonner</a>
    <a href="ekspor_tonner.php" class="btn btn-success btn-add">Export Excel</a>

    <!-- Tabel Stok Tonner -->
    <div class="table-responsive mb-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Code</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Department</th>
                    <th>Printer Type</th>
                    <th>Printer Name</th>
                    <th>Toner Type</th>
                    <th>MAX QTY</th>
                    <th>JAN</th><th>FEB</th><th>MAR</th><th>APR</th><th>MEI</th><th>JUN</th>
                    <th>Remark</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['item'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td><?= $row['department'] ?></td>
                    <td><?= $row['printer_type'] ?></td>
                    <td><?= $row['printer_name'] ?></td>
                    <td><?= $row['toner_type'] ?></td>
                    <td><?= $row['max_qty'] ?></td>
                    <td><?= $row['jan'] ?></td>
                    <td><?= $row['feb'] ?></td>
                    <td><?= $row['mar'] ?></td>
                    <td><?= $row['apr'] ?></td>
                    <td><?= $row['mei'] ?></td>
                    <td><?= $row['jun'] ?></td>
                    <td><?= $row['remark'] ?></td>
                    <td>
                        <a href="edit_tonner.php?id=<?= $row['id_tonner'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_tonner.php?id=<?= $row['id_tonner'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Tabel History Pemakaian Tonner -->
    <h4>History Pemakaian Tonner</h4>

    <a href="tambah_tonner_usage.php" class="btn btn-primary btn-add">Tambah Data Tonner</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Department</th>
                    <th>Printer Name</th>
                    <th>Type Tonner</th>
                    <th>QTY</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($history)) { ?>
                <tr>
                    <td><?= $row['month'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['department'] ?></td>
                    <td><?= $row['printer_name'] ?></td>
                    <td><?= $row['toner_type'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td>
                        <a href="edit_tonner_usage.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_tonner_usage.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
