<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama_lengkap'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $role = $_POST['role']; // Ambil role dari form
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek NIS unik di tabel users
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE nis='$nis'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIS sudah terdaftar!');</script>";
    } else {
        // Simpan ke tabel siswa (data lengkap)
        $simpan_siswa = mysqli_query($conn, "INSERT INTO siswa(nis, nama_lengkap, kelas, alamat, jenis_kelamin) 
                                              VALUES('$nis', '$nama', '$kelas', '$alamat', '$jk', '$role')");

        // Simpan ke tabel users (login)
        $simpan_users = mysqli_query($conn, "INSERT INTO users(nis, password, role) 
                                              VALUES('$nis', '$password', '$role')");

        if ($simpan_users && $simpan_siswa) {
            echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database!');</script>";
        }
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
