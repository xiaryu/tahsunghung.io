<?php
require 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tonner_usage WHERE id='$id'");
header("Location: tonner_tracking.php");
?>
