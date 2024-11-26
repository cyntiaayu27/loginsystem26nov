<?php
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin_dashboard.php');
        exit();
    } elseif ($_SESSION['role'] === 'customer') {
        header('Location: customer_dashboard.php');
        exit();
    }
}

// Dummy data user untuk autentikasi
$users = [
    'admin' => ['name' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
    'customer' => ['name' => 'customer', 'password' => 'customer123', 'role' => 'customer']
];

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['name'] === $name && $user['password'] === $password) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                header('Location: admin_dashboard.php');
                exit();
            } elseif ($user['role'] === 'customer') {
                header('Location: customer_dashboard.php');
                exit();
            }
        }
    }

    $error = "Nama atau password salah.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center">Login</h1>
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
