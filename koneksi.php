<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "db_permintaan_barang"; 

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
