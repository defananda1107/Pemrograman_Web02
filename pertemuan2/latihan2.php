<?php
// Inisiasi variabel yang digunakan
// Nama peralatan
$brg1 = "Buku";
$brg2 = "Mouse";
$brg3 = "FlashDisk";
$brg4 = "Pulpen";

// Harga per unit peralatan
$harga1 = 17500;
$harga2 = 30000;
$harga3 = 70000;
$harga4 = 22300;

// Jumlah peralatan yang ada
$jmlbrg1 = 2;
$jmlbrg2 = 5;
$jmlbrg3 = 1;
$jmlbrg4 = 3;

// Total harga per jenis peralatan
$th1 = $jmlbrg1 * $harga1;
$th2 = $jmlbrg2 * $harga2;
$th3 = $jmlbrg3 * $harga3;
$th4 = $jmlbrg4 * $harga4;

// Hitung grand total nilai peralatan
$tharga = $th1 + $th2 + $th3 + $th4;

// Besar diskon
$diskon = 5;

// Jumlah total diskon yang diberikan
$tdiskon = ($diskon * $tharga) / 100;

// Jumlah yang harus dibayar
$tdibayar = $tharga - $tdiskon;
?>

<html>
<head>
    <title>Daftar Peralatan Yang Dibeli</title>
    <style type="text/css">
        body {
            font-size: 14pt;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        table {
            font-size: 14pt;
            border-collapse: collapse;
        }
        td, th {
            padding: 8px;
        }
    </style>
</head>
<body>
    <center>
        <font face="comic sans serif" size="5" color="blue">
            Contoh Perhitungan dengan PHP
        </font>
        
        <table border="1" cellspacing="0" cellpadding="3">
            <tr>
                <td colspan="4" align="center" valign="middle" bgcolor="#FFD700">
                    <b>Daftar Pemesanan Peralatan Kantor</b>
                </td>
            </tr>
            <tr bgcolor="#87CEEB">
                <td align="center"><b>Nama Peralatan</b></td>
                <td align="center"><b>Jumlah</b></td>
                <td align="center"><b>Harga Satuan (Rp)</b></td>
                <td align="center"><b>Jumlah Harga (Rp)</b></td>
            </tr>
            
            <?php
            // Format angka ke dalam format Rupiah
            function formatRupiah($angka) {
                return number_format($angka, 0, ',', '.');
            }
            ?>
            
            <tr>
                <td align="left"><?php echo $brg1; ?></td>
                <td align="right"><?php echo $jmlbrg1; ?></td>
                <td align="right"><?php echo formatRupiah($harga1); ?></td>
                <td align="right"><?php echo formatRupiah($th1); ?></td>
            </tr>
            <tr>
                <td align="left"><?php echo $brg2; ?></td>
                <td align="right"><?php echo $jmlbrg2; ?></td>
                <td align="right"><?php echo formatRupiah($harga2); ?></td>
                <td align="right"><?php echo formatRupiah($th2); ?></td>
            </tr>
            <tr>
                <td align="left"><?php echo $brg3; ?></td>
                <td align="right"><?php echo $jmlbrg3; ?></td>
                <td align="right"><?php echo formatRupiah($harga3); ?></td>
                <td align="right"><?php echo formatRupiah($th3); ?></td>
            </tr>
            <tr>
                <td align="left"><?php echo $brg4; ?></td>
                <td align="right"><?php echo $jmlbrg4; ?></td>
                <td align="right"><?php echo formatRupiah($harga4); ?></td>
                <td align="right"><?php echo formatRupiah($th4); ?></td>
            </tr>
            <tr bgcolor="#F0F0F0">
                <td colspan="3" align="right"><b>Total Harga</b></td>
                <td align="right"><b><?php echo formatRupiah($tharga); ?></b></td>
            </tr>
            <tr bgcolor="#FFFACD">
                <td colspan="3" align="right">
                    Diskon <?php echo "( " . $diskon . "% )"; ?>
                </td>
                <td align="right"><?php echo formatRupiah($tdiskon); ?></td>
            </tr>
            <tr bgcolor="#90EE90">
                <td colspan="3" align="right"><b>Jumlah harus dibayar</b></td>
                <td align="right"><b><?php echo formatRupiah($tdibayar); ?></b></td>
            </tr>
        </table>
    </center>
</body>
</html>