<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $nis = $_POST['nis'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT users.*, siswa.nama_lengkap FROM users 
                              INNER JOIN siswa ON users.nis = siswa.nis 
                              WHERE users.nis='$nis'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['nis'] = $data['nis'];
        $_SESSION['nama'] = $data['nama_lengkap'];
        $_SESSION['role'] = $data['role'];
        header("Location: beranda.php");
    } else {
        echo "<script>alert('Login gagal! NIS atau Password salah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo Sekolah" class="logo-login">
        <h2>Login Siswa</h2>
        <form method="POST">
            NIS: <input type="text" name="nis" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="registrasi.php">Belum punya akun? Daftar di sini</a>
    </div>
</body>
</html>
