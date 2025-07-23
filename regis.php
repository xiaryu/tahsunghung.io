<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .register-card {
            width: 500px;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-weight: 700;
            color: #004080;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-register {
            background-color: #004080;
            color: white;
            font-weight: 600;
        }
        .btn-register:hover {
            background-color: #002d5a;
        }
    </style>
</head>

<body>

    <div class="register-card">
        <h2>Registrasi Karyawan</h2>
        <form action="proses_regis.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK (Nomor Induk Karyawan)</label>
                <input type="text" class="form-control" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="hp" class="form-label">No. HP</label>
                <input type="text" class="form-control" name="hp" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="hidden" name="role" value="user"> <!-- Default role user -->
            <button type="submit" class="btn btn-register w-100">Daftar</button>
        </form>
        <p class="text-center mt-3">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </p>
    </div>

</body>
</html>
