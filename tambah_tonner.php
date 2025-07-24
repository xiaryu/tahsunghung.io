<?php
require 'koneksi.php';

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO tonner_tracking (code, item, qty, department, printer_type, printer_name, toner_type, max_qty, jan, feb, mar, apr, mei, jun, remark)
            VALUES ('$_POST[code]', '$_POST[item]', '$_POST[qty]', '$_POST[department]', '$_POST[printer_type]', '$_POST[printer_name]', '$_POST[toner_type]', 
            '$_POST[max_qty]', '$_POST[jan]', '$_POST[feb]', '$_POST[mar]', '$_POST[apr]', '$_POST[mei]', '$_POST[jun]', '$_POST[remark]')";
    mysqli_query($koneksi, $sql);
    header("Location: tonner_tracking.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tonner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Poppins, sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        input.form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h3 class="mb-4 text-center">Form Tambah Tonner</h3>
                <form method="POST">

                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="code" class="form-control" placeholder="Code" required>
                        </div>
                        <div class="col">
                            <input type="text" name="item" class="form-control" placeholder="Item" required>
                        </div>
                    </div>

                    <input type="number" name="qty" class="form-control mb-3" placeholder="Qty">

                    <input type="text" name="department" class="form-control mb-3" placeholder="Department">
                    <input type="text" name="printer_type" class="form-control mb-3" placeholder="Printer Type">
                    <input type="text" name="printer_name" class="form-control mb-3" placeholder="Printer Name">
                    <input type="text" name="toner_type" class="form-control mb-3" placeholder="Toner Type">
                    <input type="number" name="max_qty" class="form-control mb-3" placeholder="Max Qty">

                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="jan" class="form-control" placeholder="JAN">
                        </div>
                        <div class="col">
                            <input type="number" name="feb" class="form-control" placeholder="FEB">
                        </div>
                        <div class="col">
                            <input type="number" name="mar" class="form-control" placeholder="MAR">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="apr" class="form-control" placeholder="APR">
                        </div>
                        <div class="col">
                            <input type="number" name="mei" class="form-control" placeholder="MEI">
                        </div>
                        <div class="col">
                            <input type="number" name="jun" class="form-control" placeholder="JUN">
                        </div>
                    </div>

                    <input type="text" name="remark" class="form-control mb-4" placeholder="Remark">

                    <button type="submit" name="simpan" class="btn btn-primary w-100 py-2">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
