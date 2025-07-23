<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="tonner_tracking.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Code', 'Item', 'Qty', 'Department', 'Printer Type', 'Printer Name', 'Toner Type', 'Max Qty',
                  'JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'Remark']);

$data = mysqli_query($koneksi, "SELECT * FROM tonner_tracking ORDER BY department ASC");
while ($row = mysqli_fetch_assoc($data)) {
    fputcsv($output, [
        $row['code'], $row['item'], $row['qty'], $row['department'], $row['printer_type'], $row['printer_name'],
        $row['toner_type'], $row['max_qty'], $row['jan'], $row['feb'], $row['mar'], $row['apr'], $row['mei'],
        $row['jun'], $row['remark']
    ]);
}
fclose($output);
exit();
?>
