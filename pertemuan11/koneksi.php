<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_bukutamu";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!"; // Tambahkan ini untuk tes sementara
}
?>