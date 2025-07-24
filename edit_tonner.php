<?php
require 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tonner_tracking WHERE id_tonner='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $sql = "UPDATE tonner_tracking SET 
                code='$_POST[code]',
                item='$_POST[item]',
                qty='$_POST[qty]',
                department='$_POST[department]',
                printer_type='$_POST[printer_type]',
                printer_name='$_POST[printer_name]',
                toner_type='$_POST[toner_type]',
                max_qty='$_POST[max_qty]',
                jan='$_POST[jan]',
                feb='$_POST[feb]',
                mar='$_POST[mar]',
                apr='$_POST[apr]',
                mei='$_POST[mei]',
                jun='$_POST[jun]',
                remark='$_POST[remark]'
            WHERE id_tonner='$id'";
    mysqli_query($koneksi, $sql);
    header("Location: tonner_tracking.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tonner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Poppins, sans-serif; background-color: #f8f9fa; }
        .card { border: none; box-shadow: 0 5px 20px rgba(0,0,0,0.1); border-radius: 15px; }
        .btn-primary { background-color: #4e73df; border: none; }
        .btn-primary:hover { background-color: #2e59d9; }
        input.form-control { border-radius: 10px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Edit Data Tonner</h3>
                <form method="POST">

                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="code" value="<?= $row['code'] ?>" class="form-control" placeholder="Code" required>
                        </div>
                        <div class="col">
                            <input type="text" name="item" value="<?= $row['item'] ?>" class="form-control" placeholder="Item" required>
                        </div>
                    </div>

                    <input type="number" name="qty" value="<?= $row['qty'] ?>" class="form-control mb-3" placeholder="Qty">

                    <input type="text" name="department" value="<?= $row['department'] ?>" class="form-control mb-3" placeholder="Department">
                    <input type="text" name="printer_type" value="<?= $row['printer_type'] ?>" class="form-control mb-3" placeholder="Printer Type">
                    <input type="text" name="printer_name" value="<?= $row['printer_name'] ?>" class="form-control mb-3" placeholder="Printer Name">
                    <input type="text" name="toner_type" value="<?= $row['toner_type'] ?>" class="form-control mb-3" placeholder="Toner Type">
                    <input type="number" name="max_qty" value="<?= $row['max_qty'] ?>" class="form-control mb-3" placeholder="Max Qty">

                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="jan" value="<?= $row['jan'] ?>" class="form-control" placeholder="JAN">
                        </div>
                        <div class="col">
                            <input type="number" name="feb" value="<?= $row['feb'] ?>" class="form-control" placeholder="FEB">
                        </div>
                        <div class="col">
                            <input type="number" name="mar" value="<?= $row['mar'] ?>" class="form-control" placeholder="MAR">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="apr" value="<?= $row['apr'] ?>" class="form-control" placeholder="APR">
                        </div>
                        <div class="col">
                            <input type="number" name="mei" value="<?= $row['mei'] ?>" class="form-control" placeholder="MEI">
                        </div>
                        <div class="col">
                            <input type="number" name="jun" value="<?= $row['jun'] ?>" class="form-control" placeholder="JUN">
                        </div>
                    </div>

                    <input type="text" name="remark" value="<?= $row['remark'] ?>" class="form-control mb-4" placeholder="Remark">

                    <button type="submit" name="update" class="btn btn-primary w-100 py-2">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
