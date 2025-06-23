<?php
session_start();
if (!isset($_SESSION['nis']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];
$nis = $_SESSION['nis'];
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : $nis;

// Warna untuk teks selamat datang
$warna = ($role === 'admin') ? 'tomato' : 'green';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda | SMK Muhammadiyah 2 Cibiru</title>
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-title">
            <img src="logo.png" alt="Logo Sekolah" class="logo">
            <h1>SMK MUHAMMADIYAH 2 CIBIRU</h1>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="#">Beranda</a></li>
                <?php if ($role === 'admin'): ?>
                    <li><a href="admin_dashboard.php">Dashboard Admin</a></li>
                    <li><a href="data_siswa.php">Kelola Siswa</a></li>
                <?php else: ?>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Program</a></li>
                    <li><a href="#">Informasi</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Kontak</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section class="banner">
        <p>Mencetak generasi muda yang berkualitas, berwawasan global, dan berakhlak mulia sesuai dengan nilai-nilai Islam.</p>
    </section>

    <!-- Pesan Selamat Datang -->
    <section class="welcome-message" style="color: <?= $warna ?>;">
        <p>👋 Selamat datang, <strong><?= htmlspecialchars($nama) ?></strong>! 
        Anda login sebagai <strong><?= htmlspecialchars($role) ?></strong> 
        di SMK Muhammadiyah 2 Cibiru.</p>
    </section>

    <!-- Konten (hanya untuk siswa) -->
    <?php if ($role === 'siswa'): ?>
    <main class="content">
        <div class="card">
            <img src="g1.jpeg" alt="membangun bangsa">
            <h3>Membangun Bangsa Dimulai Dengan Jiwa yang Berilmu</h3>
            <p>MUHAMMADIYAH.OR.ID, SAMARINDA – Menteri Pendidikan Dasar dan Menengah Abdul Mu’ti menyampaikan pidato kebangsaan dalam agenda Milad ..</p>
        </div>
        <div class="card">
            <img src="g2.jpg" alt="menata basis">
            <h3>Menata Ulang Basis Dakwah Umat Melalui Enumerasi Masjid</h3>
            <p>Majelis Tabligh Pimpinan Pusat Muhammadiyah menekankan pentingnya pendataan dan penguatan fungsi masjid sebagai pusat dakwah ...</p>
        </div>
        <div class="card">
            <img src="g3.png" alt="Artikel">
            <h3>Menjadi Muslim Yang Berkualitas</h3>
            <p>Wakil Ketua Majelis Tabligh Muhammadiyah menyampaikan ceramah berfokus pada makna “mukhbith” ...</p>
        </div>
    </main>
    <?php endif; ?>

    <!-- Logout -->
    <div class="logout-bottom">
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        Copyright &copy; 2025 Aellz. All rights reserved.
        <div class="social-icons">
            <a href="https://instagram.com" target="_blank" class="icon"><i class="fab fa-instagram"></i></a>
            <a href="https://tiktok.com" target="_blank" class="icon"><i class="fab fa-tiktok"></i></a>
            <a href="https://twitter.com" target="_blank" class="icon"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
</body>
</html>
