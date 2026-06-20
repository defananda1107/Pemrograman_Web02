<?php
// 1. Menggunakan mysqli_connect dan langsung memilih database
$koneksi = mysqli_connect("localhost", "root", "", "pemrograman_web2");

// Cek apakah koneksi database gagal
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Gunakan nama tabel yang benar ('users')
$query = "SELECT * FROM users";

// 3. Pada mysqli_query, variabel $koneksi wajib dimasukkan di dalam argumen
$eksekusi = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

echo "Koneksi dan Query Berhasil! Data siap digunakan.";
?>