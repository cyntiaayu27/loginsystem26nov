<?php
session_start(); // Memulai sesi untuk menyimpan data user

// Cek jika form login telah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Dummy data untuk autentikasi
    $users = [
        'admin' => ['name' => 'admin', 'password' => 'admin123'],
        'customer' => ['name' => 'customer', 'password' => 'customer123']
    ];

    // Autentikasi berdasarkan peran
    if ($role == 'admin' && $name == $users['admin']['name'] && $password == $users['admin']['password']) {
        $_SESSION['role'] = 'admin';
        $_SESSION['name'] = $name;
        header('Location: admin_dashboard.php');
        exit();
    } elseif ($role == 'customer' && $name == $users['customer']['name'] && $password == $users['customer']['password']) {
        $_SESSION['role'] = 'customer';
        $_SESSION['name'] = $name;
        header('Location: customer_dashboard.php');
        exit();
    } else {
        $error = "Nama atau password salah, atau peran tidak sesuai.";
    }
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
                    <div class="mb-3">
                        <label for="role" class="form-label">Login sebagai</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
