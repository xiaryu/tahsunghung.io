<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO authorization_file (no, name_list, nik, department, authorization_sign)
    VALUES ('$_POST[no]', '$_POST[name_list]', '$_POST[nik]', '$_POST[department]', '$_POST[authorization_sign]')");
    header("Location: authorization_file.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Authorization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Tambah Authorization File</h2>

<form method="POST">
    <div class="mb-3">
        <label>No</label>
        <input type="text" name="no" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Name List</label>
        <input type="text" name="name_list" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Authorization Sign</label>
        <input type="text" name="authorization_sign" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="authorization_file.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
