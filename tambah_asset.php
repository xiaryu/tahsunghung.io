<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO tracking_asset (asset_code, asset_name, sn_number)
            VALUES ('$_POST[asset_code]', '$_POST[asset_name]', '$_POST[sn_number]')";
    mysqli_query($koneksi, $sql);
    header("Location: tracking_asset.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Asset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Tambah Data Asset</h2>

<form method="POST">
    <div class="mb-3">
        <label>Asset Code</label>
        <input type="text" name="asset_code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Asset Name</label>
        <input type="text" name="asset_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>S/N Number</label>
        <input type="text" name="sn_number" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="tracking_asset.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
