<?php
// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

// Set header agar browser mendownload file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_stok.csv"');

// Buka output stream
$output = fopen('php://output', 'w');

// Header kolom
fputcsv($output, ['No', 'Kode Barang', 'Nama Barang', 'Total Stok']);

// Ambil data stok dari database
$data_stok = mysqli_query($koneksi, "SELECT * FROM stok_barang ORDER BY kode_barang ASC");

$no = 1;
while ($row = mysqli_fetch_assoc($data_stok)) {
    fputcsv($output, [
        $no++,
        $row['kode_barang'],
        $row['nama_barang'],
        $row['total_stok']
    ]);
}

fclose($output);
exit();
?>
