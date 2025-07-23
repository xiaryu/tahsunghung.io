<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$data = mysqli_query($koneksi, "SELECT * FROM tracking_asset ORDER BY asset_name ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracking Asset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Poppins, sans-serif; background-color: #f4f6f9; }
        h2 { font-weight: bold; }
        .btn-add { margin-bottom: 15px; }
        .table { font-size: 0.9rem; }
        .table-responsive { max-height: 600px; overflow-y: auto; }
    </style>
</head>
<body class="p-4">

    <h2 class="mb-4">Tracking Asset PT Tah Sung Hung</h2>

    <a href="tambah_asset.php" class="btn btn-primary btn-add">Tambah Asset</a>

    <div class="table-responsive shadow rounded">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Asset Code</th>
                <th>Asset Name</th>
                <th>S/N Number</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['asset_code']) ?></td>
                <td><?= htmlspecialchars($row['asset_name']) ?></td>
                <td><?= htmlspecialchars($row['sn_number']) ?></td>
                <td>
                    <a href="edit_asset.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_asset.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus asset ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
