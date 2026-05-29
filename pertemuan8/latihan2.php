<!DOCTYPE html>
<html>
<head>
    <title>Latihan 2 - Kalkulator dengan UDF</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 700px;
            margin: 0 auto;
        }
        h2 {
            color: #d53f8c;
            border-bottom: 3px solid #f5576c;
            padding-bottom: 10px;
            text-align: center;
        }
        .form-box {
            background: linear-gradient(135deg, #fff5f5 0%, #fed7e2 100%);
            padding: 25px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #4a5568;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #fbb6ce;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #d53f8c;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        input[type="submit"], .btn-reset {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        input[type="submit"] {
            background-color: #d53f8c;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #b83280;
        }
        .btn-reset {
            background-color: #718096;
            color: white;
            text-decoration: none;
            text-align: center;
        }
        .btn-reset:hover {
            background-color: #4a5568;
        }
        .result-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        .result-item:last-child {
            border-bottom: none;
        }
        .result-label {
            font-weight: bold;
            color: #4a5568;
        }
        .result-value {
            font-size: 20px;
            font-weight: bold;
            color: #d53f8c;
        }
        .operation-symbol {
            display: inline-block;
            width: 30px;
            text-align: center;
            color: #718096;
        }
        .error-message {
            background-color: #fed7d7;
            color: #e53e3e;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            border-left: 5px solid #e53e3e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🧮 Latihan 2: Kalkulator dengan User Defined Function</h2>
        
        <div class="form-box">
            <form method="POST" action="">
                <div class="form-group">
                    <label>📊 Masukkan Bilangan Pertama:</label>
                    <input type="number" name="A" placeholder="Contoh: 10" required>
                </div>
                <div class="form-group">
                    <label>📊 Masukkan Bilangan Kedua:</label>
                    <input type="number" name="B" placeholder="Contoh: 5" required>
                </div>
                <div class="btn-group">
                    <input type="submit" name="hitung" value="🧮 Hitung Semua">
                    <a href="latihan2_kalkulator_udf.php" class="btn-reset">🔄 Reset</a>
                </div>
            </form>
        </div>
        
        <?php
        // Definisi fungsi-fungsi kalkulator (UDF)
        function jumlah($A, $B) {
            $jumlahbil = $A + $B;
            return $jumlahbil;
        }
        
        function kurang($A, $B) {
            $kurangbil = $A - $B;
            return $kurangbil;
        }
        
        function kali($A, $B) {
            $kalibil = $A * $B;
            return $kalibil;
        }
        
        function bagi($A, $B) {
            if ($B == 0) {
                return "Error: Pembagian dengan nol";
            }
            $bagibil = $A / $B;
            return $bagibil;
        }
        
        // Fungsi tambahan
        function pangkat($A, $B) {
            return pow($A, $B);
        }
        
        function modulus($A, $B) {
            if ($B == 0) {
                return "Error: Modulus dengan nol";
            }
            return $A % $B;
        }
        
        // Proses form jika disubmit
        if (isset($_POST['hitung'])) {
            $A = $_POST['A'];
            $B = $_POST['B'];
            
            // Validasi input
            if (!is_numeric($A) || !is_numeric($B)) {
                echo "<div class='error-message'>⚠️ Mohon masukkan angka yang valid!</div>";
            } else {
                // Konversi ke tipe numerik yang sesuai
                $A = strpos($A, '.') !== false ? floatval($A) : intval($A);
                $B = strpos($B, '.') !== false ? floatval($B) : intval($B);
                
                // Hitung semua operasi
                $jumlahbil = jumlah($A, $B);
                $kurangbil = kurang($A, $B);
                $kalibil = kali($A, $B);
                $bagibil = bagi($A, $B);
                $pangkatbil = pangkat($A, $B);
                $modulusbil = modulus($A, $B);
                
                echo "<div class='result-box'>";
                
                // Informasi bilangan
                echo "<h3>📋 Informasi Bilangan:</h3>";
                echo "<div class='result-item'>";
                echo "<span class='result-label'>Bilangan Pertama:</span>";
                echo "<span class='result-value'>$A</span>";
                echo "</div>";
                echo "<div class='result-item'>";
                echo "<span class='result-label'>Bilangan Kedua:</span>";
                echo "<span class='result-value'>$B</span>";
                echo "</div>";
                
                // Hasil operasi
                echo "<h3 style='margin-top:25px;'>📊 Hasil Operasi:</h3>";
                
                // Penjumlahan
                echo "<div class='result-item'>";
                echo "<span class='result-label'><span class='operation-symbol'>➕</span> Penjumlahan:</span>";
                echo "<span class='result-value'>$A + $B = $jumlahbil</span>";
                echo "</div>";
                
                // Pengurangan
                echo "<div class='result-item'>";
                echo "<span class='result-label'><span class='operation-symbol'>➖</span> Pengurangan:</span>";
                echo "<span class='result-value'>$A - $B = $kurangbil</span>";
                echo "</div>";
                
                // Perkalian
                echo "<div class='result-item'>";
                echo "<span class='result-label'><span class='operation-symbol'>✖️</span> Perkalian:</span>";
                echo "<span class='result-value'>$A × $B = $kalibil</span>";
                echo "</div>";
                
                // Pembagian
                echo "<div class='result-item'>";
                echo "<span class='result-label'><span class='operation-symbol'>➗</span> Pembagian:</span>";
                if (is_string($bagibil)) {
                    echo "<span class='result-value' style='color:#e53e3e;'>$bagibil</span>";
                } else {
                    echo "<span class='result-value'>$A ÷ $B = " . number_format($bagibil, 2) . "</span>";
                }
                echo "</div>";
                
                // Perpangkatan
                echo "<div class='result-item'>";
                echo "<span class='result-label'><span class='operation-symbol'>^</span> Perpangkatan:</span>";
                echo "<span class='result-value'>$A ^ $B = $pangkatbil</span>";
                echo "</div>";
                
                // Modulus (hanya untuk integer)
                if (is_int($A) && is_int($B)) {
                    echo "<div class='result-item'>";
                    echo "<span class='result-label'><span class='operation-symbol'>%</span> Modulus:</span>";
                    if (is_string($modulusbil)) {
                        echo "<span class='result-value' style='color:#e53e3e;'>$modulusbil</span>";
                    } else {
                        echo "<span class='result-value'>$A % $B = $modulusbil</span>";
                    }
                    echo "</div>";
                }
                
                echo "</div>";
                
                // Tampilkan dalam format printf juga (seperti di slide)
                echo "<div style='background:#2d3748; color:#fbd38d; padding:15px; border-radius:8px; margin-top:20px; font-family:monospace;'>";
                echo "<strong>// Output dengan printf():</strong><br>";
                printf("Penjumlahan antara : %d + %d = %d<br>", $A, $B, $jumlahbil);
                printf("Pengurangan antara : %d - %d = %d<br>", $A, $B, $kurangbil);
                printf("Perkalian antara   : %d * %d = %d<br>", $A, $B, $kalibil);
                if (!is_string($bagibil)) {
                    printf("Pembagian antara   : %d / %d = %.2f<br>", $A, $B, $bagibil);
                }
                echo "</div>";
            }
        } else {
            // Tampilan default saat pertama kali load
            echo "<div style='text-align:center; padding:30px; color:#718096;'>";
            echo "📝 Masukkan dua bilangan dan klik 'Hitung Semua' untuk melihat hasil operasi matematika.";
            echo "</div>";
        }
        ?>
        
        <h3 style="margin-top:30px;">📚 Daftar Fungsi UDF yang Digunakan:</h3>
        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tr style="background:#fbb6ce;">
                <th style="padding:10px; text-align:left;">Nama Fungsi</th>
                <th style="padding:10px; text-align:left;">Deskripsi</th>
            </tr>
            <tr><td style="padding:8px;"><code>jumlah($A, $B)</code></td><td>Menghitung penjumlahan dua bilangan</td></tr>
            <tr><td style="padding:8px;"><code>kurang($A, $B)</code></td><td>Menghitung pengurangan dua bilangan</td></tr>
            <tr><td style="padding:8px;"><code>kali($A, $B)</code></td><td>Menghitung perkalian dua bilangan</td></tr>
            <tr><td style="padding:8px;"><code>bagi($A, $B)</code></td><td>Menghitung pembagian dua bilangan</td></tr>
            <tr><td style="padding:8px;"><code>pangkat($A, $B)</code></td><td>Menghitung perpangkatan</td></tr>
            <tr><td style="padding:8px;"><code>modulus($A, $B)</code></td><td>Menghitung sisa pembagian</td></tr>
        </table>
    </div>
</body>
</html>