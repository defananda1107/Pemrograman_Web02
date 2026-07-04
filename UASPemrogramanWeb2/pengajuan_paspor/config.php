<?php
// ==========================================================
// KONFIGURASI KONEKSI DATABASE
// Sesuaikan jika username/password MySQL Anda berbeda
// ==========================================================
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "db_paspor";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error() .
        "<br>Pastikan MySQL sudah aktif dan database 'db_paspor' sudah diimport dari file database.sql");
}
mysqli_set_charset($conn, "utf8mb4");
?>
