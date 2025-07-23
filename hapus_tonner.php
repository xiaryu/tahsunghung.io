<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tonner_tracking WHERE id_tonner = '$id'");
header("Location: tonner_tracking.php");
?>
