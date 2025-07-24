<?php
require 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tracking_asset WHERE id='$id'");
header("Location: tracking_asset.php");
?>
