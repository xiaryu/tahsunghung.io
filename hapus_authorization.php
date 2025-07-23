<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM authorization_file WHERE id='$id'");
header("Location: authorization_file.php");
?>
