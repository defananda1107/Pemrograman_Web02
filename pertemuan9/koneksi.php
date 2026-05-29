<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "artikel_db"; 

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi ke database '$dbname' berhasil!";
}
?>