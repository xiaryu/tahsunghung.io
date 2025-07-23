<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM authorization_file WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "UPDATE authorization_file SET 
        no='$_POST[no]',
        name_list='$_POST[name_list]',
        nik='$_POST[nik]',
        department='$_POST[department]',
        authorization_sign='$_POST[authorization_sign]'
        WHERE id='$id'");
    header("Location: authorization_file.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Authorization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Edit Authorization File</h2>

<form method="POST">
    <div class="mb-3">
        <label>No</label>
        <input type="text" name="no" value="<?= $row['no'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Name List</label>
        <input type="text" name="name_list" value="<?= $row['name_list'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" value="<?= $row['nik'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" value="<?= $row['department'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Authorization Sign</label>
        <input type="text" name="authorization_sign" value="<?= $row['authorization_sign'] ?>" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="authorization_file.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
