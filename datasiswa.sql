CREATE DATABASE IF NOT EXISTS db_login;
USE db_login;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    nama_lengkap VARCHAR(100) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    dibuat TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    password VARCHAR(255) NOT NULL
);
