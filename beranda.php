<?php
session_start();
if (!isset($_SESSION['nis'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Selamat Datang</title>
    <link rel="stylesheet" href="beranda.css">
</head>
<body>
    <div class="container">
        <div class="welcome-box">
            <h2>Halo, <?php echo htmlspecialchars($_SESSION['nama']); ?> 👋</h2>
            <p>Selamat datang di halaman beranda!</p>

            <table class="info-table">
                <tr>
                    <td class="label">NIS</td>
                    <td><?php echo htmlspecialchars($_SESSION['nis']); ?></td>
                </tr>
                <!-- Tambahan jika ingin menampilkan data lain -->
                <!--
                <tr>
                    <td class="label">Kelas</td>
                    <td><?php echo htmlspecialchars($_SESSION['kelas']); ?></td>
                </tr>
                -->
            </table>

            <form action="logout.php" method="POST">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
