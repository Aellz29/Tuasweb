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
    <title>Beranda | SMK Muhammadiyah 2 Cibiru</title>
    <link rel="stylesheet" href="beranda.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-title">
            <img src="logo.png" alt="Logo Sekolah" class="logo">
            <h1>SMK MUHAMMADIYAH 2 CIBIRU</h1>
        </div>
        <!-- <div class="profile-icon">
            <a href="profile.php" title="Lihat Profil">
                <i class="fas fa-user-circle"></i>
            </a>
        </div> -->
        <nav class="navbar">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Program</a></li>
                <li><a href="#">Informasi</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner -->
    <section class="banner">
        <p>
            Mencetak generasi muda yang berkualitas, berwawasan global, dan berakhlak mulia sesuai dengan nilai-nilai Islam.
        </p>
    </section>
    <!-- Pesan Selamat Datang -->
<section class="welcome-message" style="color: <?= $warna ?>;">
    <p>👋 Selamat datang, <strong><?php echo htmlspecialchars($_SESSION['nama']); ?></strong>! 
    Anda berhasil login sebagai <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong> 
    di SMK Muhammadiyah 2 Cibiru.</p>
</section>



    <!-- Konten -->
    <main class="content">
        <div class="card">
            <img src="g1.jpeg" alt="membangun bangsa">
            <h3>Membangun Bangsa Dimulai Dengan Jiwa yang Berilmu</h3>
            <p>MUHAMMADIYAH.OR.ID, SAMARINDA – Menteri Pendidikan Dasar dan Menengah (Mendikdasmen) Abdul Mu’ti menyampaikan pidato kebangsaan yang inspiratif dalam agenda Resepsi Milad ..</p>
        </div>
        <div class="card">
            <img src="g2.jpg" alt="menata basis">
            <h3>Menata Ulang Basis Dakwah Umat Melalui Enumerasi Masjid Muhammadiyah</h3>
            <p>MUHAMMADIYAH.OR.ID, YOGYAKARTA — Majelis Tabligh Pimpinan Pusat (PP) Muhammadiyah menekankan pentingnya pendataan dan penguatan fungsi masjid sebagai pusat dakwah dan ...</p>
        </div>
        <div class="card">
            <img src="g3.png" alt="Artikel">
            <h3>Menjadi Muslim Yang Berkualitas</h3>
            <p>MUHAMMADIYAH.OR.ID, YOGYAKARTA — Wakil Ketua Majelis Tabligh Pimpinan Pusat Muhammadiyah Muhammad Ikhwan Ahada menyampaikan ceramah yang berfokus pada makna “mukhbith” ...</p>
        </div>
    </main>
    <!-- Tombol Logout di bagian bawah -->
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
