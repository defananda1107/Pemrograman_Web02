-- Membuat database
CREATE DATABASE db_bukutamu;

-- Menggunakan database tersebut
USE db_bukutamu;

-- Membuat tabel buku tamu
CREATE TABLE tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    instansi VARCHAR(100),
    pesan TEXT NOT NULL,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);