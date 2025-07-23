<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tracking_asset WHERE id='$id'");
$edit = mysqli_fetch_assoc($data);

if (!$edit) {
    echo "<script>alert('Asset tidak ditemukan!'); window.location='tracking_asset.php';</script>";
    exit();
}

if (isset($_POST['simpan'])) {
    $sql = "UPDATE tracking_asset SET
            asset_code = '$_POST[asset_code]',
            asset_name = '$_POST[asset_name]',
            sn_number = '$_POST[sn_number]'
            WHERE id='$id'";
    mysqli_query($koneksi, $sql);
    header("Location: tracking_asset.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Asset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Edit Asset</h2>

<form method="POST">
    <div class="mb-3">
        <label>Asset Code</label>
        <input type="text" name="asset_code" value="<?= $edit['asset_code'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Asset Name</label>
        <input type="text" name="asset_name" value="<?= $edit['asset_name'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>S/N Number</label>
        <input type="text" name="sn_number" value="<?= $edit['sn_number'] ?>" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="tracking_asset.php" class="btn btn-secondary">Kembali</a>
</form>

</body>
</html>
