<!DOCTYPE html>
<html>
<head>
    <title>Latihan 8 - Penggunaan join()</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #2b6cb0;
            border-bottom: 3px solid #66a6ff;
            padding-bottom: 10px;
        }
        .result-box {
            background: linear-gradient(135deg, #ebf8ff 0%, #bee3f8 100%);
            border-left: 5px solid #2b6cb0;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .date-display {
            font-size: 36px;
            font-weight: bold;
            color: #2b6cb0;
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        code {
            background-color: #2d3748;
            color: #fbd38d;
            padding: 3px 8px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #90cdf4;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2b6cb0;
            color: white;
        }
        .example-item {
            background-color: #ebf8ff;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 8px;
            border-left: 4px solid #2b6cb0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔗 Latihan 8: Fungsi join()</h2>
        
        <?php
        echo "<div class='result-box'>";
        
        // Array tanggal
        $var = array('25', '04', '2026');
        
        // Menggunakan join() untuk menggabungkan array dengan pemisah "/"
        $tanggal = join("/", $var);
        
        echo "<h3>Hasil join():</h3>";
        echo "<div class='date-display'>📅 $tanggal</div>";
        
        echo "<br>";
        echo "<code>\$var = array('25', '04', '2026');</code><br>";
        echo "<code>\$tanggal = join(\"/\", \$var);</code><br>";
        echo "<br>Hasil: <strong>$tanggal</strong>";
        
        echo "</div>";
        
        // Contoh tambahan - berbagai penggunaan join()/implode()
        echo "<h3>📚 Berbagai Contoh Penggunaan join() / implode():</h3>";
        
        // Contoh 1: join dengan berbagai pemisah
        echo "<h4>1. join() dengan Berbagai Pemisah:</h4>";
        
        $kata = array('Saya', 'sedang', 'belajar', 'PHP');
        
        echo "<table>";
        echo "<tr><th>Pemisah</th><th>Hasil</th></tr>";
        
        $pemisah = [' ' => 'Spasi', ', ' => 'Koma', '-' => 'Strip', '_' => 'Underscore', ' | ' => 'Pipe'];
        
        foreach ($pemisah as $char => $nama) {
            $hasil = join($char, $kata);
            echo "<tr>";
            echo "<td>$nama (<code>'$char'</code>)</td>";
            echo "<td><code>$hasil</code></td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Contoh 2: join vs implode (identik)
        echo "<h4>2. join() vs implode() (Fungsi Identik):</h4>";
        
        $buah = array('Apel', 'Jeruk', 'Mangga', 'Pisang');
        
        $joinResult = join(", ", $buah);
        $implodeResult = implode(", ", $buah);
        
        echo "<div class='example-item'>";
        echo "<strong>Array:</strong> "; print_r($buah); echo "<br><br>";
        echo "<strong>join(', ', \$buah):</strong> $joinResult<br>";
        echo "<strong>implode(', ', \$buah):</strong> $implodeResult<br>";
        echo "<em>→ Keduanya menghasilkan output yang sama!</em>";
        echo "</div>";
        
        // Contoh 3: Format Rupiah dengan join
        echo "<h4>3. Membuat Format Rupiah:</h4>";
        
        $nominal = 1500000;
        $arrNominal = str_split($nominal);
        $formatNominal = number_format($nominal, 0, ',', '.');
        
        echo "<div class='example-item'>";
        echo "Nominal: $nominal<br>";
        echo "Array: "; print_r($arrNominal); echo "<br>";
        echo "Format Rupiah: <strong>Rp $formatNominal</strong>";
        echo "</div>";
        
        // Contoh 4: Membuat Query SQL sederhana
        echo "<h4>4. Membuat IN Clause untuk SQL:</h4>";
        
        $ids = array(101, 102, 103, 104, 105);
        $inClause = "(" . join(", ", $ids) . ")";
        $sql = "SELECT * FROM produk WHERE id IN $inClause";
        
        echo "<div class='example-item'>";
        echo "<strong>Array ID:</strong> "; print_r($ids); echo "<br><br>";
        echo "<strong>IN Clause:</strong> <code>$inClause</code><br><br>";
        echo "<strong>Query SQL:</strong><br>";
        echo "<code style='background:#1a202c; color:#68d391; display:block; padding:10px;'>$sql</code>";
        echo "</div>";
        
        // Contoh 5: Membuat List HTML
        echo "<h4>5. Membuat List HTML:</h4>";
        
        $menu = array('Home', 'Profil', 'Produk', 'Kontak');
        $htmlList = "<ul>\n<li>" . join("</li>\n<li>", $menu) . "</li>\n</ul>";
        
        echo "<div class='example-item'>";
        echo "<strong>Array Menu:</strong> "; print_r($menu); echo "<br><br>";
        echo "<strong>Hasil HTML:</strong><br>";
        echo $htmlList;
        echo "</div>";
        ?>
        
        <h3>📝 Penjelasan:</h3>
        <ul>
            <li><code>join()</code> menggabungkan elemen array menjadi string dengan pemisah tertentu</li>
            <li><code>join()</code> adalah alias dari <code>implode()</code> (fungsi identik)</li>
            <li>Sintaks: <code>join($pemisah, $array)</code></li>
            <li>Kebalikan dari fungsi <code>split()</code> / <code>explode()</code></li>
            <li>Sangat berguna untuk membuat format tanggal, URL, query SQL, dll.</li>
        </ul>
    </div>
</body>
</html>