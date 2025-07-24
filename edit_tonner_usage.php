<?php
require 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tonner_usage WHERE id='$id'"));

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE tonner_usage SET
        month='$_POST[month]',
        date='$_POST[date]',
        department='$_POST[department]',
        printer_name='$_POST[printer_name]',
        toner_type='$_POST[toner_type]',
        qty='$_POST[qty]'
        WHERE id='$id'");
    header("Location: tonner_tracking.php");
}
?>

<h2>Edit History Pemakaian Tonner</h2>
<form method="POST">
    <input type="text" name="month" value="<?= $data['month'] ?>" required><br>
    <input type="date" name="date" value="<?= $data['date'] ?>" required><br>
    <input type="text" name="department" value="<?= $data['department'] ?>" required><br>
    <input type="text" name="printer_name" value="<?= $data['printer_name'] ?>" required><br>
    <input type="text" name="toner_type" value="<?= $data['toner_type'] ?>" required><br>
    <input type="number" name="qty" value="<?= $data['qty'] ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>
