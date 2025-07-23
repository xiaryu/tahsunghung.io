<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

// Proses tambah data
if (isset($_POST['simpan'])) {
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];
    $borrow_time = $_POST['borrow_time'];
    $return_time = $_POST['return_time'];
    $nik = $_POST['nik'];
    $asset_name = $_POST['asset_name'];
    $kelompok = $_POST['kelompok'];

    mysqli_query($koneksi, "INSERT INTO peminjaman_barang 
        (borrow_date, return_date, borrow_time, return_time, nik, asset_name, kelompok) VALUES 
        ('$borrow_date', '$return_date', '$borrow_time', '$return_time', '$nik', '$asset_name', '$kelompok')");

    header("Location: peminjaman_barang.php");
    exit();
}

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM peminjaman_barang WHERE id = $id");
    header("Location: peminjaman_barang.php");
    exit();
}

$data = mysqli_query($koneksi, "SELECT * FROM peminjaman_barang ORDER BY borrow_date DESC");
$kelompok = ['Kelompok 1', 'FHO', 'Business', 'DEV', 'ME', 'QIP', 'ADM'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background-color: #f0f8ff; font-family: 'Poppins', sans-serif; }
        .tab-content { background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .nav-tabs .nav-link.active { background-color: #0d6efd; color: white; font-weight: bold; }
        .card-header { font-size: 1.1rem; }
        table { font-size: 0.85rem; }
        .fade-effect { opacity: 0; transform: translateY(20px); transition: all 0.7s ease; }
        .fade-effect.show { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="p-4">

<h2 class="mb-4 fw-bold text-primary">Peminjaman Barang PT Tah Sung Hung</h2>

<!-- Form Tambah Data -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white fw-bold">Tambah Data Peminjaman</div>
    <div class="card-body">
        <form method="post">
            <div class="row g-3">
                <div class="col-md-3">
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="borrow_date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="return_date" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>Jam Pinjam</label>
                    <input type="time" name="borrow_time" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>Jam Kembali</label>
                    <input type="time" name="return_time" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Nama Barang / Aset</label>
                    <input type="text" name="asset_name" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Kelompok</label>
                    <select name="kelompok" class="form-select" required>
                        <?php foreach ($kelompok as $grp) { echo "<option value='$grp'>$grp</option>"; } ?>
                    </select>
                </div>
                <div class="col-md-2 d-grid align-items-end">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tab Menu -->
<ul class="nav nav-tabs mb-3" id="kelompokTabs" role="tablist">
    <?php foreach ($kelompok as $index => $group) { ?>
        <li class="nav-item">
            <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="tab-<?= $index ?>"
                    data-bs-toggle="tab" data-bs-target="#kelompok-<?= $index ?>" type="button"><?= $group ?></button>
        </li>
    <?php } ?>
</ul>

<!-- Konten Tabel Tiap Kelompok -->
<div class="tab-content fade-effect" id="tabContent">
    <?php foreach ($kelompok as $index => $group) { ?>
        <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="kelompok-<?= $index ?>">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <?php if ($group == 'ME') { ?>
                                <th>Borrow ID</th>
                                <th>Asset ID</th>
                                <th>Asset Name</th>
                                <th>Borrow Date</th>
                                <th>Borrow Time</th>
                                <th>Employee No</th>
                                <th>Borrower Name</th>
                                <th>Dept ID</th>
                                <th>Ret Stat</th>
                                <th>Return Stat</th>
                                <th>Return Emp No</th>
                                <th>Return Emp Name</th>
                                <th>Return Date</th>
                                <th>Return Time</th>
                            <?php } else { ?>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>NIK</th>
                                <th>Borrow Time</th>
                                <th>Return Time</th>
                                <th>Asset</th>
                            <?php } ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        mysqli_data_seek($data, 0); // reset pointer
                        while ($row = mysqli_fetch_assoc($data)) {
                            if ($row['kelompok'] != $group) continue;
                        ?>
                        <tr>
                            <?php if ($group == 'ME') { ?>
                                <td><?= $row['borrow_id'] ?? '' ?></td>
                                <td><?= $row['asset_id'] ?? '' ?></td>
                                <td><?= $row['asset_name'] ?></td>
                                <td><?= $row['borrow_date'] ?></td>
                                <td><?= $row['borrow_time'] ?></td>
                                <td><?= $row['borrower_employee_no'] ?? '' ?></td>
                                <td><?= $row['borrower_name'] ?? '' ?></td>
                                <td><?= $row['borrower_dept_id'] ?? '' ?></td>
                                <td><?= $row['ret_stat'] ?? '' ?></td>
                                <td><?= $row['return_stat'] ?? '' ?></td>
                                <td><?= $row['return_employee_no'] ?? '' ?></td>
                                <td><?= $row['return_emp_name'] ?? '' ?></td>
                                <td><?= $row['return_date'] ?></td>
                                <td><?= $row['return_time'] ?></td>
                            <?php } else { ?>
                                <td><?= $row['borrow_date'] ?></td>
                                <td><?= $row['return_date'] ?></td>
                                <td><?= $row['nik'] ?></td>
                                <td><?= $row['borrow_time'] ?></td>
                                <td><?= $row['return_time'] ?></td>
                                <td><?= $row['asset_name'] ?></td>
                            <?php } ?>
                            <td>
                                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    window.addEventListener('load', () => {
        document.getElementById('tabContent').classList.add('show');
    });
</script>
<br>
<a href="dashboard_admin.php" class="btn btn-secondary">Kembali</a>
</body>
</html>
