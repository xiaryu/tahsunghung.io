<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'leader') {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

// Query jumlah data dari database
$total_stok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM stok_barang"))['total'];
$barang_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_masuk"))['total'];
$barang_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_keluar"))['total'];
$peminjaman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman_barang"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leader Dashboard - PT Tah Sung Hung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #fffafc, #e0eaff);
    }
    .card {
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      transition: 0.3s ease-in-out;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    .navbar {
      background: #6610f2;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .icon-box {
      font-size: 2.5rem;
      color: #6610f2;
    }
    .fade-in {
      animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-gem"></i> Leader Panel</a>
  </div>
</nav>

<div class="container mt-5">
  <div class="row g-4 fade-in">
    <div class="col-md-3">
      <div class="card p-4">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-box-seam"></i></div>
          <div>
            <h6>Total Stok Barang</h6>
            <h3 class="fw-bold text-primary"><?= $total_stok ?></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-truck"></i></div>
          <div>
            <h6>Barang Masuk</h6>
            <h3 class="fw-bold text-success"><?= $barang_masuk ?></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-box-arrow-right"></i></div>
          <div>
            <h6>Barang Keluar</h6>
            <h3 class="fw-bold text-danger"><?= $barang_keluar ?></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-4">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-laptop"></i></div>
          <div>
            <h6>Peminjaman</h6>
            <h3 class="fw-bold text-warning"><?= $peminjaman ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5 fade-in">
    <div class="col-md-12">
      <div class="card p-4">
        <h5 class="mb-3"><i class="bi bi-bar-chart-line"></i> Statistik Penggunaan Barang</h5>
        <canvas id="leaderChart" height="100"></canvas>
      </div>
    </div>
  </div>
</div>
<a href="logout.php" class="btn btn-secondary">logout</a>
<script>
  const ctx = document.getElementById('leaderChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Stok Barang', 'Masuk', 'Keluar', 'Peminjaman'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= $total_stok ?>, <?= $barang_masuk ?>, <?= $barang_keluar ?>, <?= $peminjaman ?>],
        backgroundColor: [
          '#0d6efd',
          '#198754',
          '#dc3545',
          '#ffc107'
        ],
        borderRadius: 10
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>

</body>
</html>
