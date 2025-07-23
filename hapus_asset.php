<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tracking_asset WHERE id='$id'");
header("Location: tracking_asset.php");
?>
