<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO tonner_usage (month, date, department, printer_name, toner_type, qty)
    VALUES ('$_POST[month]', '$_POST[date]', '$_POST[department]', '$_POST[printer_name]', '$_POST[toner_type]', '$_POST[qty]')");
    header("Location: tonner_tracking.php");
}
?>

<h2>Tambah History Pemakaian Tonner</h2>
<form method="POST">
    <input type="text" name="month" placeholder="Month" required><br>
    <input type="date" name="date" required><br>
    <input type="text" name="department" placeholder="Department" required><br>
    <input type="text" name="printer_name" placeholder="Printer Name" required><br>
    <input type="text" name="toner_type" placeholder="Type Tonner" required><br>
    <input type="number" name="qty" placeholder="QTY" required><br><br>
    <button type="submit" name="simpan">Simpan</button>
</form>
