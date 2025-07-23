<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM stok_barang WHERE id='$id'"));

if (isset($_POST['update'])) {
    $code = $_POST['code'];
    $item = $_POST['item'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "UPDATE stok_barang SET 
                            code='$code', item='$item', tanggal='$tanggal', jumlah='$jumlah'
                            WHERE id='$id'");
    header("Location: stok_barang.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Stok Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h3>Edit Stok Barang</h3>

    <form method="POST">
        <input type="text" name="code" class="form-control mb-2" value="<?= $data['code'] ?>" required>
        <input type="text" name="item" class="form-control mb-2" value="<?= $data['item'] ?>" required>
        <input type="date" name="tanggal" class="form-control mb-2" value="<?= $data['tanggal'] ?>" required>
        <input type="number" name="jumlah" class="form-control mb-2" value="<?= $data['jumlah'] ?>" required>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="stok_barang.php" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>
