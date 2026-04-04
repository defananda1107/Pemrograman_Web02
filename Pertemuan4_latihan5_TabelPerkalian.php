<!DOCTYPE html>
<html>
<head>
    <title>Tabel Perkalian</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            margin-top: 15px;
            width: 300px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td, th {
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input {
            padding: 5px;
            margin: 3px;
        }
    </style>
</head>
<body>

<h2>Input Tabel Perkalian</h2>

<form method="post">
    Masukkan angka: 
    <input type="number" name="angka" required>
    <br><br>

    Dari: 
    <input type="number" name="awal" value="1">

    Sampai: 
    <input type="number" name="akhir" value="10">
    <br><br>

    <input type="submit" name="submit" value="Tampilkan">
</form>

<hr>

<?php
if (isset($_POST['submit'])) {
    $angka = $_POST['angka'];
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];

    echo "<h3>Tabel Perkalian $angka</h3>";

    echo "<table border='1'>";
    echo "<tr>
            <th>No</th>
            <th>Perkalian</th>
            <th>Hasil</th>
          </tr>";

    for ($i = $awal; $i <= $akhir; $i++) {
        $hasil = $angka * $i;

        echo "<tr>
                <td>$i</td>
                <td>$angka x $i</td>
                <td>$hasil</td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>