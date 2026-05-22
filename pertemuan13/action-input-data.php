<?php

include "koneksi.php";

$id_mahasiswa = $_POST['id_mahasiswa'];
$nama         = $_POST['nama'];
$jurusan      = $_POST['jurusan'];
$alamat       = $_POST['alamat'];
$telepon      = $_POST['telepon'];

if(
    empty($id_mahasiswa) ||
    empty($nama) ||
    empty($alamat) ||
    empty($telepon)
){

    echo "
    <script>
    alert('Data Harap Dilengkapi!');
    window.location='index.php';
    </script>
    ";

    exit;
}

$cek = mysqli_query(
    $conn,
    "SELECT * FROM mahasiswa
     WHERE id_mahasiswa='$id_mahasiswa'"
);

if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
    alert('NIM sudah digunakan!');
    window.location='index.php';
    </script>
    ";

    exit;
}

$query = mysqli_query(
    $conn,
    "INSERT INTO mahasiswa
    (id_mahasiswa,nama,jurusan,alamat,telepon)
    VALUES
    ('$id_mahasiswa',
     '$nama',
     '$jurusan',
     '$alamat',
     '$telepon')"
);

if($query){

    echo "
    <script>
    alert('Data Mahasiswa Berhasil Disimpan');
    window.location='index.php';
    </script>
    ";

}else{

    echo "
    <script>
    alert('Gagal Menyimpan Data');
    window.location='index.php';
    </script>
    ";

}

?>