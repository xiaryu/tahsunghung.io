<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_permintaan_barang");

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO peminjaman_barang 
    (kelompok, borrow_id, asset_id, asset_name, borrow_date, return_date, nik, borrow_time, return_time, borrower_employee_no, borrower_name, borrower_dept_id, ret_stat, return_stat, return_employee_no, return_emp_name)
    VALUES (
        '$_POST[kelompok]', '$_POST[borrow_id]', '$_POST[asset_id]', '$_POST[asset_name]', '$_POST[borrow_date]', '$_POST[return_date]', 
        '$_POST[nik]', '$_POST[borrow_time]', '$_POST[return_time]', '$_POST[borrower_employee_no]', '$_POST[borrower_name]', 
        '$_POST[borrower_dept_id]', '$_POST[ret_stat]', '$_POST[return_stat]', '$_POST[return_employee_no]', '$_POST[return_emp_name]'
    )";

    mysqli_query($koneksi, $sql);
    header("Location: peminjaman_barang.php");
}
?>

<form method="POST">
    <h3>Tambah Peminjaman Barang</h3>
    <select name="kelompok" required>
        <option value="">- Pilih Kelompok -</option>
        <option value="Kelompok 1">Kelompok 1</option>
        <option value="FHO">FHO</option>
        <option value="Business">Business</option>
        <option value="DEV">DEV</option>
        <option value="ME">ME</option>
        <option value="QIP">QIP</option>
        <option value="ADM">ADM</option>
    </select><br><br>

    <input type="text" name="borrow_id" placeholder="Borrow ID"><br>
    <input type="text" name="asset_id" placeholder="Asset ID"><br>
    <input type="text" name="asset_name" placeholder="Asset Name" required><br>
    <input type="date" name="borrow_date" required><br>
    <input type="date" name="return_date"><br>
    <input type="text" name="nik" placeholder="NIK"><br>
    <input type="time" name="borrow_time"><br>
    <input type="time" name="return_time"><br>
    <input type="text" name="borrower_employee_no" placeholder="Employee No"><br>
    <input type="text" name="borrower_name" placeholder="Borrower Name"><br>
    <input type="text" name="borrower_dept_id" placeholder="Dept ID"><br>
    <input type="text" name="ret_stat" placeholder="Ret Stat"><br>
    <input type="text" name="return_stat" placeholder="Return Stat"><br>
    <input type="text" name="return_employee_no" placeholder="Return Employee No"><br>
    <input type="text" name="return_emp_name" placeholder="Return Emp Name"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>
