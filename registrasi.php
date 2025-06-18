<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama_lengkap'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // lebih aman

    // Cek NIS unik
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE nis='$nis'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIS sudah terdaftar!');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users(nis, nama_lengkap, kelas, alamat, jenis_kelamin, password)
                             VALUES('$nis', '$nama', '$kelas', '$alamat', '$jk', '$password')");
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna</h2>
        <form method="POST">
            NIS: <input type="text" name="nis" required><br>
            Nama Lengkap: <input type="text" name="nama_lengkap" required><br>
            Kelas: <input type="text" name="kelas" required><br>
            Alamat: <textarea name="alamat" required></textarea><br>
            Jenis Kelamin: 
            <select name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" name="register" value="Daftar">
        </form>
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </div>
</body>
</html>
