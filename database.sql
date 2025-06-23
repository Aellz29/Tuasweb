CREATE DATABASE db_sekolah;
USE db_sekolah;

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nis VARCHAR(20),
    kelas VARCHAR(20),
    jk VARCHAR(20),
    alamat TEXT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20),
    password VARCHAR(100),
    role VARCHAR(20)
);
