<?php
session_start();
include 'koneksi.php';

// Cek apakah user admin
if (!isset($_SESSION['nis']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$kelas_array = ["X RPL", "XI RPL", "XII RPL"];

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    // Cek NIS sudah ada atau belum
    $cek_nis = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    if (mysqli_num_rows($cek_nis) > 0) {
        echo "<script>alert('NIS sudah digunakan. Gunakan NIS lain.');</script>";
    } else {
        // Simpan ke tabel siswa
        $simpan_siswa = mysqli_query($conn, "INSERT INTO siswa (nama, nis, kelas, jk, alamat)
            VALUES ('$nama', '$nis', '$kelas', '$jk', '$alamat')");

        // Simpan ke tabel users
        $simpan_user = mysqli_query($conn, "INSERT INTO users (username, password, role)
            VALUES ('$nis', '$password', 'siswa')");

        if ($simpan_siswa && $simpan_user) {
            echo "<script>alert('Akun siswa berhasil dibuat!'); window.location='admin_dashboard.php';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal menyimpan data.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Halo Admin, buat akun siswa baru</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="nis" placeholder="NIS" required>
        <select name="kelas" required>
            <option value="">Pilih Kelas</option>
            <?php foreach ($kelas_array as $k): ?>
                <option value="<?= $k ?>"><?= $k ?></option>
            <?php endforeach; ?>
        </select>
        <select name="jk" required>
            <option value="">Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <textarea name="alamat" placeholder="Alamat" required></textarea>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Buat Akun</button>
    </form>

    <h3>Daftar Siswa Terdaftar</h3>
    <table>
        <tr>
            <th>Nama</th><th>NIS</th><th>Kelas</th><th>JK</th><th>Alamat</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['nis']}</td>
                <td>{$row['kelas']}</td>
                <td>{$row['jk']}</td>
                <td>{$row['alamat']}</td>
            </tr>";
        }
        ?>
    </table>

    <br><a href="logout.php">Logout</a>
</div>
</body>
</html>
