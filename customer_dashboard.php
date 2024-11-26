<?php
session_start();
if ($_SESSION['role'] !== 'customer') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>
    <h1>Selamat datang, Customer <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
    <p>Ini adalah halaman Customer.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
