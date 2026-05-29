<!DOCTYPE html>
<html>
<head>
    <title>Latihan 5 - Penggunaan list()</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            color: #d53f8c;
            border-bottom: 3px solid #f5576c;
            padding-bottom: 10px;
        }
        .result-box {
            background: linear-gradient(135deg, #fff5f5 0%, #fed7e2 100%);
            border-left: 5px solid #d53f8c;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .card {
            display: inline-block;
            background: white;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
            min-width: 120px;
        }
        .card-icon {
            font-size: 40px;
            margin-bottom: 10px;
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
            border: 1px solid #fbb6ce;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #d53f8c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Latihan 5: Fungsi list()</h2>
        
        <?php
        echo "<div class='result-box'>";
        
        // Array program
        $program = array('Bobo', 'Doraemon', 'Spiderman');
        
        // Menggunakan list() untuk memecah array ke variabel
        list($Majalah, $Komik, $Film) = $program;
        
        echo "<h3>Jenis Buku & Hiburan :</h3>";
        echo "<div style='font-size: 18px;'>";
        echo "📰 Cerpen : <strong>$Majalah</strong><br>";
        echo "📚 Cerita Bergambar : <strong>$Komik</strong><br>";
        echo "🎬 Bioskop : <strong>$Film</strong>";
        echo "</div>";
        
        echo "</div>";
        
        // Contoh tambahan - berbagai penggunaan list()
        echo "<h3>🔄 Berbagai Contoh Penggunaan list():</h3>";
        
        // Contoh 1: Array numerik sederhana
        echo "<h4>1. Array Numerik Sederhana:</h4>";
        $buah = array('Apel', 'Jeruk', 'Mangga');
        list($buah1, $buah2, $buah3) = $buah;
        
        echo "<div class='card'>";
        echo "<div class='card-icon'>🍎</div>";
        echo "<strong>$buah1</strong>";
        echo "</div>";
        echo "<div class='card'>";
        echo "<div class='card-icon'>🍊</div>";
        echo "<strong>$buah2</strong>";
        echo "</div>";
        echo "<div class='card'>";
        echo "<div class='card-icon'>🥭</div>";
        echo "<strong>$buah3</strong>";
        echo "</div>";
        
        // Contoh 2: Skip beberapa elemen (kosongkan)
        echo "<h4>2. Melewatkan Elemen Tertentu:</h4>";
        $warna = array('Merah', 'Hijau', 'Biru', 'Kuning');
        list($warna1, , $warna3, ) = $warna; // Skip elemen ke-2 dan ke-4
        
        echo "<code>\$warna = array('Merah', 'Hijau', 'Biru', 'Kuning');</code><br>";
        echo "<code>list(\$warna1, , \$warna3, ) = \$warna;</code><br><br>";
        echo "Hasil: \$warna1 = <strong>$warna1</strong>, \$warna3 = <strong>$warna3</strong><br>";
        echo "<em>(Elemen 'Hijau' dan 'Kuning' dilewatkan)</em>";
        
        // Contoh 3: Array asosiatif (PHP 7.1+)
        echo "<h4>3. Array Asosiatif (PHP 7.1+):</h4>";
        $mahasiswa = ['nama' => 'Andi', 'nim' => '2024001', 'jurusan' => 'TI'];
        
        echo "<code>\$mahasiswa = ['nama' => 'Andi', 'nim' => '2024001', 'jurusan' => 'TI'];</code><br><br>";
        
        // Contoh 4: Nested list
        echo "<h4>4. Nested list() (Array dalam Array):</h4>";
        $data = array(
            array('Budi', 25, 'Jakarta'),
            array('Ani', 23, 'Bandung')
        );
        
        echo "<table>";
        echo "<tr><th>Nama</th><th>Usia</th><th>Kota</th></tr>";
        
        foreach ($data as $row) {
            list($nama, $usia, $kota) = $row;
            echo "<tr>";
            echo "<td>$nama</td>";
            echo "<td>$usia tahun</td>";
            echo "<td>$kota</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Contoh 5: list() dengan range()
        echo "<h4>5. list() dengan range():</h4>";
        list($senin, $selasa, $rabu, $kamis, $jumat) = range(1, 5);
        
        echo "<code>list(\$senin, \$selasa, \$rabu, \$kamis, \$jumat) = range(1, 5);</code><br><br>";
        echo "Hari ke-1: $senin<br>";
        echo "Hari ke-2: $selasa<br>";
        echo "Hari ke-3: $rabu<br>";
        echo "Hari ke-4: $kamis<br>";
        echo "Hari ke-5: $jumat<br>";
        ?>
        
        <h3>📝 Penjelasan:</h3>
        <ul>
            <li><code>list()</code> digunakan untuk mengekstrak nilai array ke dalam variabel terpisah</li>
            <li>Sintaks: <code>list($var1, $var2, ...) = $array;</code></li>
            <li>Jumlah variabel harus ≤ jumlah elemen array</li>
            <li>Bisa melewatkan elemen dengan mengosongkan posisi: <code>list($a, , $c) = $array;</code></li>
            <li>Sangat berguna untuk memecah array menjadi variabel individual</li>
        </ul>
    </div>
</body>
</html>