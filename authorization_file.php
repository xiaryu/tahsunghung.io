<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$data = mysqli_query($koneksi, "SELECT * FROM authorization_file ORDER BY no ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Authorization File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Poppins, sans-serif; background-color: #f8f9fa; }
        h2 { font-weight: bold; }
        .table-responsive { max-height: 600px; overflow-y: auto; }
        .btn-add { margin-bottom: 15px; }
    </style>
</head>
<body class="p-4">

    <h2 class="mb-4">Authorization File PT Tah Sung Hung</h2>

    <a href="tambah_authorization.php" class="btn btn-primary btn-add">➕ Tambah Authorization</a>

    <div class="table-responsive shadow rounded bg-white">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Name List</th>
                    <th>NIK</th>
                    <th>Department</th>
                    <th>Authorization Sign</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['no']) ?></td>
                    <td><?= htmlspecialchars($row['name_list']) ?></td>
                    <td><?= htmlspecialchars($row['nik']) ?></td>
                    <td><?= htmlspecialchars($row['department']) ?></td>
                    <td><?= htmlspecialchars($row['authorization_sign']) ?></td>
                    <td>
                        <a href="edit_authorization.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_authorization.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</body>
</html>
