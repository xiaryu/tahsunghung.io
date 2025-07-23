<?php
$config = parse_ini_file('.env.ini');

$host = $config['DB_HOST'];
$user = $config['DB_USER'];
$pass = $config['DB_PASS'];
$dbname = $config['DB_NAME'];

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
