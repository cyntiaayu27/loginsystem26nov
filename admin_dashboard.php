<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Admin <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
    <p>Ini adalah halaman Admin.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
