<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'koneksi.php';

// Set header agar file diunduh sebagai CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=data_user.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['No', 'Username', 'Password', 'Role']);

$no = 1;
$data_user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY username ASC");
while ($row = mysqli_fetch_assoc($data_user)) {
    fputcsv($output, [$no, $row['username'], $row['password'], $row['role']]);
    $no++;
}

fclose($output);
exit();
