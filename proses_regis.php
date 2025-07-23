<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// User ID auto / bisa dibuat format khusus
$id_user = uniqid("U");

// Simpan ke tabel users
mysqli_query($koneksi, "INSERT INTO user (id_user, username, password, role) VALUES 
    ('$id_user', '$username', '$password', '$role')");

// Bisa buat tabel user_detail tambahan untuk menyimpan nama, nik, alamat, hp jika perlu.

echo "<script>alert('Pendaftaran berhasil. Silakan login.'); window.location='login.php';</script>";
?>
