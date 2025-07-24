<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'koneksi.php';

// Ambil semua user
$data_user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY username ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User - PT TSH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f1f4f7;">

<div class="container bg-white mt-5 p-4 rounded shadow">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data User Terdaftar</h3>
        <a href="ekspor_user.php" class="btn btn-success">Ekspor CSV</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($data_user)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['role']}</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <a href="dashboard_admin.php" class="btn btn-secondary w-100 mt-3">Kembali ke Dashboard</a>
</div>

</body>
</html>
