<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$nis' AND password='$password'");
$data = mysqli_fetch_assoc($result);

if ($data) {
    $_SESSION['nis'] = $nis;
    $_SESSION['role'] = $data['role'];

    header("Location: index.php");
    exit;
} else {
    echo "<script>alert('Login gagal! Cek NIS dan Password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Siswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Login Siswa</h2>
    <form method="POST">
        <input type="text" name="nis" placeholder="NIS" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
        <p><a href="#" action="data_siswa.php">Belum Punya AKun ? Daftar !</a></p>
    </form>
</div>
</body>
</html>
