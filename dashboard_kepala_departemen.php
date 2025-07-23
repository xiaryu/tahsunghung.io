<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'departemen') {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

// Ambil data dari database
$total_stok = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM stok_barang"))['total'];
$barang_masuk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_masuk"))['total'];
$barang_keluar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang_keluar"))['total'];
$total_peminjaman = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman_barang"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kepala Departemen Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background: linear-gradient(to right, #f0f9ff, #ffffff);
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: .3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }
    .icon-box {
      font-size: 2.5rem;
      color: #0d6efd;
    }
    .navbar {
      background-color: #0d6efd;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-building"></i> Kepala Departemen</a>
  </div>
</nav>

<div class="container mt-4">
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card p-3">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-box-seam"></i></div>
          <div>
            <h6>Total Stok</h6>
            <h4><?= $total_stok ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-box-arrow-in-down"></i></div>
          <div>
            <h6>Barang Masuk</h6>
            <h4><?= $barang_masuk ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-box-arrow-up"></i></div>
          <div>
            <h6>Barang Keluar</h6>
            <h4><?= $barang_keluar ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <div class="d-flex align-items-center">
          <div class="icon-box me-3"><i class="bi bi-journal-arrow-up"></i></div>
          <div>
            <h6>Peminjaman</h6>
            <h4><?= $total_peminjaman ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card p-4">
        <h5><i class="bi bi-graph-up-arrow"></i> Statistik Aktivitas Barang</h5>
        <canvas id="statistikChart" height="100"></canvas>
      </div>
    </div>
  </div>
</div>
<a href="logout.php" class="btn btn-secondary">logout</a>
<script>
  const ctx = document.getElementById('statistikChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Stok', 'Masuk', 'Keluar', 'Pinjam'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= $total_stok ?>, <?= $barang_masuk ?>, <?= $barang_keluar ?>, <?= $total_peminjaman ?>],
        backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545'],
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
