<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; background-color: #f9f9f9; }
        .sidebar {
            background: #003366; color: #fff; min-height: 100vh;
            transition: width 0.3s ease;
        }
        .sidebar a {
            color: white; display: block; padding: 15px 20px;
            text-decoration: none; font-weight: 500;
        }
        .sidebar a:hover { background-color: #002244; }
        .sidebar.collapsed { width: 70px; }
        .sidebar.collapsed a span { display: none; }
        .sidebar-toggler {
            background: #001f33; color: white; border: none;
            width: 100%; padding: 10px; font-size: 20px;
        }
        .content { transition: margin-left 0.3s ease; padding: 20px; }
        .card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover { transform: scale(1.02); }
    </style>
</head>
<body>

<div class="d-flex">
    <div id="sidebar" class="sidebar">
        <button class="sidebar-toggler" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
        <a href="#"><i class="fas fa-warehouse"></i> <span>Stok Barang</span></a>
        <a href="#"><i class="fas fa-truck-loading"></i> <span>Barang Masuk</span></a>
        <a href="#"><i class="fas fa-dolly"></i> <span>Barang Keluar</span></a>
        <a href="#"><i class="fas fa-print"></i> <span>Tonner Tracking</span></a>
        <a href="#"><i class="fas fa-desktop"></i> <span>Tracking Asset</span></a>
        <a href="#"><i class="fas fa-lock"></i> <span>Authorization File</span></a>
        <a href="#"><i class="fas fa-handshake"></i> <span>Peminjaman</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
    </div>

    <div class="content w-100">
        <h2 class="mb-4">Dashboard Admin</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-warehouse fa-2x text-primary mb-3"></i>
                    <h5>Stok Barang</h5>
                    <p>Kelola stok seluruh barang IT perusahaan.</p>
                    <a href="dashboard_stok.php" class="btn btn-primary w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-truck-loading fa-2x text-success mb-3"></i>
                    <h5>Barang Masuk</h5>
                    <p>Catat dan kelola data barang masuk.</p>
                    <a href="barang_masuk.php" class="btn btn-success w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-dolly fa-2x text-danger mb-3"></i>
                    <h5>Barang Keluar</h5>
                    <p>Catat dan kelola data barang keluar.</p>
                    <a href="barang_keluar.php" class="btn btn-danger w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-print fa-2x text-warning mb-3"></i>
                    <h5>Tonner Tracking</h5>
                    <p>Monitor penggunaan tonner printer.</p>
                    <a href="tonner_tracking.php" class="btn btn-warning w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-desktop fa-2x text-secondary mb-3"></i>
                    <h5>Tracking Asset</h5>
                    <p>Kelola & monitor semua aset IT.</p>
                    <a href="tracking_asset.php" class="btn btn-secondary w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-lock fa-2x text-dark mb-3"></i>
                    <h5>Authorization File</h5>
                    <p>Kelola akses dokumen/file penting.</p>
                    <a href="authorization_file.php" class="btn btn-dark w-100">Lihat</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-4">
                    <i class="fas fa-handshake fa-2x text-info mb-3"></i>
                    <h5>Peminjaman Barang</h5>
                    <p>Kelola & pantau proses peminjaman barang.</p>
                    <a href="peminjaman_barang.php" class="btn btn-info w-100">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    }
</script>

</body>
</html>
