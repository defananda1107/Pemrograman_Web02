<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengajuan Paspor - Kantor Imigrasi Cabang</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header-box">
    <h2>PENGAJUAN PASPOR</h2>
    <small>Kantor Imigrasi Cabang &mdash; Programmer: [nama mahasiswa]</small>
</div>

<div class="nav-menu">
    <a href="index.php" class="<?php echo ($page ?? '') === 'daftar' ? 'active' : ''; ?>">Daftar</a>
    <a href="daftar_ulang.php" class="<?php echo ($page ?? '') === 'daftar_ulang' ? 'active' : ''; ?>">Daftar Ulang</a>
    <a href="pengurusan.php" class="<?php echo ($page ?? '') === 'pengurusan' ? 'active' : ''; ?>">Pengurusan</a>
</div>

<div class="container">
