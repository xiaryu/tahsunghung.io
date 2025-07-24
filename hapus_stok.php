<?php
require 'koneksi.php';

// Validasi ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eksekusi Hapus
    mysqli_query($koneksi, "DELETE FROM stok_barang WHERE id_barang='$id'");

    // Redirect kembali ke dashboard setelah hapus
    header("Location: dashboard_stok.php");
    exit;
} else {
    // Jika ID tidak ditemukan, redirect langsung
    header("Location: dashboard_stok.php");
    exit;
}
?>
