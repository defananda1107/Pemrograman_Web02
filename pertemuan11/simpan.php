<?php
include 'koneksi.php';

$nama    = $_POST['nama'];
$email   = $_POST['email'];
$instansi = $_POST['instansi'];
$pesan   = $_POST['pesan'];
$tanggal = date('Y-m-d');

$query = "INSERT INTO tamu (nama, email, instansi, pesan, tanggal) 
          VALUES ('$nama', '$email', '$instansi', '$pesan', '$tanggal')";

if (mysqli_query($koneksi, $query)) {
    // Redirect otomatis ke halaman daftar tamu
    header("Location: lihat_tamu.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}