<?php
include 'koneksi.php';

$kelas_array = ["C1 Informatika", "C2 Informatika", "C3 Informatika"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    // Cek apakah NIS sudah ada
    $cek_nis = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    if (mysqli_num_rows($cek_nis) > 0) {
        echo "<script>alert('NIS sudah terdaftar. Gunakan NIS lain.'); window.location='data_siswa.php';</script>";
    } else {
        // Simpan jika NIS belum ada
        $simpan_siswa = mysqli_query($conn, "INSERT INTO siswa (nama, nis, kelas, jk, alamat) VALUES 
            ('$nama', '$nis', '$kelas', '$jk', '$alamat')");

        $simpan_user = mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES 
            ('$nis', '$password', 'siswa')");

        if ($simpan_siswa && $simpan_user) {
            echo "<script>alert('Pendaftaran berhasil!'); window.location='data_siswa.php';</script>";
            exit;
        } else {
            echo "<script>alert('Pendaftaran gagal. Coba lagi.');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Siswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Form Pendaftaran Siswa</h2>
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
        <button type="submit" action="login.php">Daftar</button>
        <a href="index.php">Back ke halaman admin</a>
    </form>

    <h3>Daftar Siswa</h3>
    <table>
        <tr>
            <th>Nama</th><th>NIS</th><th>Kelas</th><th>JK</th><th>Alamat</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM siswa");
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
</div>
</body>
</html>
