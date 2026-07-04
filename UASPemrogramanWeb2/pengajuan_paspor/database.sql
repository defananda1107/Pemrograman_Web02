-- ==========================================================
-- DATABASE: db_paspor
-- Aplikasi Pengajuan Paspor - Kantor Imigrasi Cabang
-- UAS Pemrograman Web II
-- ==========================================================

CREATE DATABASE IF NOT EXISTS db_paspor;
USE db_paspor;

-- ----------------------------------------------------------
-- TABEL 1: pendaftar (Input Daftar)
-- ----------------------------------------------------------
DROP TABLE IF EXISTS pengurusan;
DROP TABLE IF EXISTS daftar_ulang;
DROP TABLE IF EXISTS pendaftar;

CREATE TABLE pendaftar (
    no_daftar    INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemohon VARCHAR(100) NOT NULL,
    tgl_daftar   DATE NOT NULL,
    hari         VARCHAR(20) NOT NULL,   -- hari harus datang (hasil kalkulasi kapasitas)
    tanggal      DATE NOT NULL,          -- tanggal harus datang (hasil kalkulasi kapasitas)
    jam          TIME NOT NULL           -- jam harus datang
);

-- ----------------------------------------------------------
-- TABEL 2: daftar_ulang (Input Data Daftar Ulang)
-- ----------------------------------------------------------
CREATE TABLE daftar_ulang (
    no_daftar_ulang   INT AUTO_INCREMENT PRIMARY KEY,
    no_daftar         INT NOT NULL,
    nama_pemohon      VARCHAR(100) NOT NULL,
    keperluan         VARCHAR(50) NOT NULL,
    ktp               ENUM('Ada','Tidak') NOT NULL,
    kk                ENUM('Ada','Tidak') NOT NULL,
    ijazah_akte       ENUM('Ada','Tidak') NOT NULL,
    hari_harus_datang VARCHAR(20) NOT NULL,
    tgl_harus_datang  DATE NOT NULL,
    hari_datang       VARCHAR(20) NOT NULL,
    tgl_datang        DATE NOT NULL,
    keterangan        ENUM('OK','Tidak') NOT NULL,
    no_antrian        VARCHAR(30) DEFAULT NULL,
    FOREIGN KEY (no_daftar) REFERENCES pendaftar(no_daftar) ON DELETE CASCADE
);

-- ----------------------------------------------------------
-- TABEL 3: pengurusan (Pengurusan Berkas)
-- ----------------------------------------------------------
CREATE TABLE pengurusan (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    no_antrian   VARCHAR(30) NOT NULL,
    no_daftar    INT NOT NULL,
    nama_pemohon VARCHAR(100) NOT NULL,
    berkas       VARCHAR(20) NOT NULL,
    status       VARCHAR(20) NOT NULL,
    keterangan   VARCHAR(10) NOT NULL,
    pembayaran   INT NOT NULL DEFAULT 0
);

-- ==========================================================
-- DUMMY DATA
-- ==========================================================

-- 6 pendaftar pada tanggal 2026-07-01 (Rabu) -> kapasitas 5/hari
-- sehingga pendaftar ke-6 (Fajar) otomatis digeser ke 2026-07-02 (Kamis)
INSERT INTO pendaftar (nama_pemohon, tgl_daftar, hari, tanggal, jam) VALUES
('Andi Saputra',  '2026-07-01', 'Rabu',  '2026-07-01', '09:00:00'),
('Budi Santoso',  '2026-07-01', 'Rabu',  '2026-07-01', '10:00:00'),
('Citra Dewi',    '2026-07-01', 'Rabu',  '2026-07-01', '11:00:00'),
('Dian Permata',  '2026-07-01', 'Rabu',  '2026-07-01', '13:00:00'),
('Eka Wijaya',    '2026-07-01', 'Rabu',  '2026-07-01', '14:00:00'),
('Fajar Nugraha', '2026-07-01', 'Kamis', '2026-07-02', '09:00:00'),
('Gita Lestari',  '2026-07-03', 'Jumat', '2026-07-03', '09:00:00');

-- Data daftar ulang:
-- 1) Andi datang sesuai jadwal (2026-07-01), berkas lengkap -> Keterangan OK, dapat No Antrian
-- 2) Budi datang TIDAK sesuai jadwal (datang 2026-07-02 padahal harusnya 07-01) -> Keterangan Tidak, no antrian kosong
-- 3) Citra datang sesuai jadwal, tapi Ijazah/Akte tidak ada -> tetap Keterangan OK (datang sesuai jadwal), No Antrian tetap didapat
--    (kelengkapan berkas dicek ulang & menentukan status di menu Pengurusan)
INSERT INTO daftar_ulang (no_daftar, nama_pemohon, keperluan, ktp, kk, ijazah_akte, hari_harus_datang, tgl_harus_datang, hari_datang, tgl_datang, keterangan, no_antrian) VALUES
(1, 'Andi Saputra', 'Paspor Baru',   'Ada',   'Ada',   'Ada',   'Rabu', '2026-07-01', 'Rabu',  '2026-07-01', 'OK',    'ANT-20260701-001'),
(2, 'Budi Santoso', 'Perpanjangan',  'Ada',   'Ada',   'Ada',   'Rabu', '2026-07-01', 'Kamis', '2026-07-02', 'Tidak', NULL),
(3, 'Citra Dewi',   'Paspor Baru',   'Ada',   'Ada',   'Tidak', 'Rabu', '2026-07-01', 'Rabu',  '2026-07-01', 'OK',    'ANT-20260701-002');

-- Data pengurusan berkas:
-- 1) Andi -> berkas lengkap semua -> Diterima, bayar 355rb
-- 2) Citra -> Ijazah/Akte tidak ada -> Tidak Lengkap -> Ditolak, bayar 0
INSERT INTO pengurusan (no_antrian, no_daftar, nama_pemohon, berkas, status, keterangan, pembayaran) VALUES
('ANT-20260701-001', 1, 'Andi Saputra', 'Lengkap',      'Diterima', 'OK',    355000),
('ANT-20260701-002', 3, 'Citra Dewi',   'Tidak Lengkap','Ditolak',  'Tidak', 0);
