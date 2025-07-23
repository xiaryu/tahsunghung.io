<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'spv') {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

// Ambil data dari database
$total_stok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM stok_barang"))['total'];
$total_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_masuk"))['total'];
$total_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_keluar"))['total'];
$total_pinjam = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman_barang"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Supervisor Dashboard - PT Tah Sung Hung</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f4f9ff, #ffffff);
    }
    .card {
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    }
    .navbar {
      background-color: #0d6efd;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .icon {
      font-size: 2.5rem;
      color: #0d6efd;
    }
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-bar-chart-steps"></i> Dashboard Supervisor</a>
  </div>
</nav>

<div class="container py-5">
  <div class="row g-4 fade-in">
    <div class="col-md-3">
      <div class="card p-4 text-center">
        <i class="bi bi-boxes icon mb-2"></i>
        <h5>Stok Barang</h5>
        <h3 class="text-primary"><?= $total_stok ?></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4 text-center">
        <i class="bi bi-arrow-down-circle icon mb-2"></i>
        <h5>Barang Masuk</h5>
        <h3 class="text-success"><?= $total_masuk ?></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4 text-center">
        <i class="bi bi-arrow-up-circle icon mb-2"></i>
        <h5>Barang Keluar</h5>
        <h3 class="text-danger"><?= $total_keluar ?></h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4 text-center">
        <i class="bi bi-journal-arrow-up icon mb-2"></i>
        <h5>Peminjaman</h5>
        <h3 class="text-warning"><?= $total_pinjam ?></h3>
      </div>
    </div>
  </div>

  <div class="row mt-5 fade-in">
    <div class="col-md-12">
      <div class="card p-4">
        <h5><i class="bi bi-graph-up"></i> Statistik Barang</h5>
        <canvas id="barangChart" height="100"></canvas>
      </div>
    </div>
  </div>
</div>
<a href="logout.php" class="btn btn-secondary">logout</a>
<script>
  const ctx = document.getElementById('barangChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Stok', 'Masuk', 'Keluar', 'Dipinjam'],
      datasets: [{
        label: 'Total',
        data: [<?= $total_stok ?>, <?= $total_masuk ?>, <?= $total_keluar ?>, <?= $total_pinjam ?>],
        backgroundColor: ['#0d6efd', '#198754', '#dc3545', '#ffc107'],
        borderRadius: 10,
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          grace: '5%',
        }
      }
    }
  });
</script>

</body>
</html>
