<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PT Tah Sung Hung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            width: 400px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            background: white;
            padding: 40px 30px;
            text-align: center;
        }
        .login-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #004080;
            color: white;
            font-weight: 600;
        }
        .btn-login:hover {
            background-color: #002d5a;
        }
        h2 {
            font-weight: 700;
            color: #004080;
            font-size: 1.5rem;
        }
        .register-link {
            margin-top: 15px;
            font-size: 0.95rem;
        }
        .register-link a {
            color: #004080;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-card">
        
        <h2 class="mb-4">Login PT Tah Sung Hung</h2>
        <form action="proses_login.php" method="POST">
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="regis.php">Daftar di sini</a>
        </div>
    </div>
</body>

</html>
