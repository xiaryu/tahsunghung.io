<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Barang IT | PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: white;
            overflow-x: hidden;
        }

        header {
            padding: 20px;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            background-color: #1e293b;
            letter-spacing: 1px;
            color: #facc15;
            box-shadow: 0 4px 10px rgba(0,0,0,0.4);
        }

        .hero {
            text-align: center;
            padding: 100px 20px 50px;
            background: linear-gradient(135deg, #1e3a8a, #2563eb, #1d4ed8);
            border-bottom-left-radius: 80px;
            border-bottom-right-radius: 80px;
            animation: fadeIn 1.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .btn-start {
            background-color: #facc15;
            color: #1e293b;
            font-weight: 700;
            padding: 14px 35px;
            font-size: 18px;
            border-radius: 50px;
            margin-top: 30px;
            transition: 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-start:hover {
            background-color: #eab308;
            transform: scale(1.05);
            color: #0f172a;
        }

        section.features {
            margin: 80px auto;
            max-width: 1200px;
        }

        .feature-card {
            background: #1e293b;
            border-radius: 20px;
            padding: 30px 20px;
            color: #f1f5f9;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: #334155;
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: #aaa;
            padding: 30px 0;
            background: #1e293b;
            margin-top: 100px;
        }
    </style>
</head>
<body>

<header>
    Sistem Informasi Barang IT <br> PT Tah Sung Hung
</header>

<section class="hero">
    <h1 class="mb-3">Selamat Datang</h1>
    <p class="lead">Kelola seluruh aset IT perusahaan Anda secara profesional, real-time, dan terintegrasi.</p>
    <a href="login.php" class="btn-start">Login</a>
</section>

<section class="container features text-center">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card h-100">
                <h4>📦 Manajemen Stok</h4>
                <p class="mt-2">Pantau dan kelola semua stok barang IT perusahaan Anda dengan mudah dan akurat.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <h4>🛠️ Data Lengkap</h4>
                <p class="mt-2">Catat semua spesifikasi hardware maupun software secara detail dan lengkap.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card h-100">
                <h4>📊 Monitoring Real-Time</h4>
                <p class="mt-2">Akses data barang Anda kapan saja, di mana saja, melalui dashboard responsif & mobile-friendly.</p>
            </div>
        </div>
    </div>
</section>

<footer>
    &copy; <?= date('Y'); ?> PT Tah Sung Hung. All Rights Reserved.
</footer>

</body>
</html>
