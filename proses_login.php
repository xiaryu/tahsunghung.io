<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "sukma");

// Ambil input dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Cek user di database
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' LIMIT 1");
$user = mysqli_fetch_assoc($query);

if ($user) {
    if ($password === $user['password']) {  // tanpa hash (bisa ditambahkan hash nanti)
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect sesuai role
        if ($user['role'] === 'admin') {
            header("Location: dashboard_admin.php");
        } elseif ($user['role'] === 'user') {
            header("Location:  formulir_user.php");
        } elseif ($user['role'] === 'leader') {
            header("Location: dashboard_leader.php");
        } elseif ($user['role'] === 'spv') {
            header("Location: dashboard_spv.php");
        } elseif ($user['role'] === 'departemen') {
            header("Location: dashboard_kepala_departemen.php");
        } else {
            header("Location: dashboard_default.php");
        }
        exit();
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
}
?>
