<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        input[type="reset"] {
            background-color: #f44336;
            color: white;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border-radius: 5px;
            border-left: 5px solid #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kalkulator Sederhana</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Angka Pertama:</label>
                <input type="number" name="angka1" required placeholder="Masukkan angka">
            </div>
            <div class="form-group">
                <label>Angka Kedua:</label>
                <input type="number" name="angka2" required placeholder="Masukkan angka">
            </div>
            <div class="form-group">
                <label>Operasi:</label>
                <select name="operasi" style="padding: 8px; width: 218px;">
                    <option value="tambah">Penjumlahan (+)</option>
                    <option value="kurang">Pengurangan (-)</option>
                    <option value="kali">Perkalian (×)</option>
                    <option value="bagi">Pembagian (÷)</option>
                    <option value="pangkat">Perpangkatan (^)</option>
                </select>
            </div>
            <div style="text-align: center;">
                <input type="submit" name="hitung" value="Hitung">
                <input type="reset" value="Reset">
            </div>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operasi = $_POST['operasi'];
            $hasil = 0;
            $simbol = "";
            
            switch ($operasi) {
                case "tambah":
                    $hasil = $angka1 + $angka2;
                    $simbol = "+";
                    break;
                case "kurang":
                    $hasil = $angka1 - $angka2;
                    $simbol = "-";
                    break;
                case "kali":
                    $hasil = $angka1 * $angka2;
                    $simbol = "×";
                    break;
                case "bagi":
                    if ($angka2 != 0) {
                        $hasil = $angka1 / $angka2;
                        $simbol = "÷";
                    } else {
                        $hasil = "Error (Tidak bisa dibagi 0)";
                    }
                    break;
                case "pangkat":
                    $hasil = pow($angka1, $angka2);
                    $simbol = "^";
                    break;
            }
            
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            
            if ($operasi == "pangkat") {
                echo "<p><b>$angka1 $simbol $angka2 = $hasil</b></p>";
            } else {
                echo "<p><b>$angka1 $simbol $angka2 = $hasil</b></p>";
            }
            
            // Tampilkan detail perhitungan dalam tabel
            echo "<h4>Detail Perhitungan:</h4>";
            echo "<table>";
            echo "<tr><th>Keterangan</th><th>Nilai</th></tr>";
            echo "<tr><td>Angka Pertama</td><td>$angka1</td></tr>";
            echo "<tr><td>Angka Kedua</td><td>$angka2</td></tr>";
            echo "<tr><td>Operasi</td><td>" . ucfirst($operasi) . "</td></tr>";
            echo "<tr><td><b>Hasil</b></td><td><b>$hasil</b></td></tr>";
            echo "</table>";
            
            // Bonus: Tipe data hasil
            echo "<h4>Informasi Tipe Data:</h4>";
            echo "<table>";
            echo "<tr><th>Variabel</th><th>Tipe Data</th></tr>";
            echo "<tr><td>Angka 1</td><td>" . gettype($angka1) . "</td></tr>";
            echo "<tr><td>Angka 2</td><td>" . gettype($angka2) . "</td></tr>";
            echo "<tr><td>Hasil</td><td>" . gettype($hasil) . "</td></tr>";
            echo "</table>";
            
            echo "</div>";
        }
        ?>
        
        <hr>
        <h3>Contoh Operator PHP:</h3>
        <?php
        echo "<h4>1. Operator Aritmatika:</h4>";
        $a = 10;
        $b = 3;
        echo "$a + $b = " . ($a + $b) . "<br>";
        echo "$a - $b = " . ($a - $b) . "<br>";
        echo "$a × $b = " . ($a * $b) . "<br>";
        echo "$a ÷ $b = " . ($a / $b) . "<br>";
        echo "$a % $b = " . ($a % $b) . " (Modulus/Sisa bagi)<br>";
        echo "$a ^ $b = " . pow($a, $b) . " (Perpangkatan)<br>";
        
        echo "<h4>2. Operator Assignment:</h4>";
        $x = 5;
        echo "x = $x<br>";
        $x += 3;
        echo "x += 3 → x = $x<br>";
        $x -= 2;
        echo "x -= 2 → x = $x<br>";
        $x *= 4;
        echo "x *= 4 → x = $x<br>";
        
        echo "<h4>3. Operator Perbandingan:</h4>";
        $p = 10;
        $q = "10";
        echo "p = 10, q = '10'<br>";
        echo "p == q → " . var_export($p == $q, true) . " (Sama nilai)<br>";
        echo "p === q → " . var_export($p === $q, true) . " (Sama nilai dan tipe)<br>";
        
        echo "<h4>4. Operator Logika:</h4>";
        $benar = true;
        $salah = false;
        echo "benar AND salah → " . var_export($benar && $salah, true) . "<br>";
        echo "benar OR salah → " . var_export($benar || $salah, true) . "<br>";
        ?>
    </div>
</body>
</html>