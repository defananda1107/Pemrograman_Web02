<!DOCTYPE html>
<html>
<head>
    <title>Latihan Bonus - Semua Fungsi Array Lanjutan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
        }
        h2 {
            color: #2980b9;
            margin-top: 25px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 5px;
        }
        .function-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            background-color: #fafafa;
        }
        .function-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        code {
            background-color: #2d3748;
            color: #fbd38d;
            padding: 3px 8px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
        }
        .output {
            background-color: #e8f4f8;
            border-left: 4px solid #2980b9;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐘 Ringkasan Fungsi Array Lanjutan PHP</h1>
        
        <!-- is_array() -->
        <div class="function-card">
            <div class="function-title">1. is_array() - Memeriksa Tipe Array</div>
            <?php
            $test = array(1, 2, 3);
            $bukanArray = "Hello";
            echo "<code>is_array(array(1,2,3)) = " . (is_array($test) ? 'TRUE' : 'FALSE') . "</code><br>";
            echo "<code>is_array('Hello') = " . (is_array($bukanArray) ? 'TRUE' : 'FALSE') . "</code>";
            ?>
        </div>
        
        <!-- list() -->
        <div class="function-card">
            <div class="function-title">2. list() - Mengekstrak Array ke Variabel</div>
            <?php
            $info = array('John', 25, 'Programmer');
            list($nama, $usia, $job) = $info;
            echo "<code>list(\$nama, \$usia, \$job) = array('John', 25, 'Programmer');</code><br>";
            echo "<div class='output'>Nama: $nama, Usia: $usia, Pekerjaan: $job</div>";
            ?>
        </div>
        
        <!-- split() / explode() -->
        <div class="function-card">
            <div class="function-title">3. explode() - Memecah String ke Array</div>
            <?php
            $str = "apel,jeruk,mangga,pisang";
            $arr = explode(",", $str);
            echo "<code>explode(',', 'apel,jeruk,mangga,pisang')</code><br>";
            echo "<div class='output'>"; print_r($arr); echo "</div>";
            ?>
        </div>
        
        <!-- join() / implode() -->
        <div class="function-card">
            <div class="function-title">4. join() / implode() - Menggabungkan Array ke String</div>
            <?php
            $arr = array('18', '11', '2010');
            $date = join("/", $arr);
            echo "<code>join('/', array('18','11','2010')) = '$date'</code><br>";
            echo "<code>implode('-', array('2024','01','15')) = '" . implode("-", array('2024','01','15')) . "'</code>";
            ?>
        </div>
        
        <!-- in_array() -->
        <div class="function-card">
            <div class="function-title">5. in_array() - Mencari Nilai dalam Array</div>
            <?php
            $buah = array("apel", "jeruk", "mangga");
            echo "<code>in_array('jeruk', ['apel','jeruk','mangga']) = " . (in_array('jeruk', $buah) ? 'TRUE' : 'FALSE') . "</code><br>";
            echo "<code>in_array('durian', ['apel','jeruk','mangga']) = " . (in_array('durian', $buah) ? 'TRUE' : 'FALSE') . "</code>";
            ?>
        </div>
        
        <!-- array_key_exists() -->
        <div class="function-card">
            <div class="function-title">6. array_key_exists() - Memeriksa Key Array</div>
            <?php
            $mhs = array("nama" => "Budi", "nim" => "12345");
            echo "<code>array_key_exists('nama', \$mhs) = " . (array_key_exists('nama', $mhs) ? 'TRUE' : 'FALSE') . "</code><br>";
            echo "<code>array_key_exists('kelas', \$mhs) = " . (array_key_exists('kelas', $mhs) ? 'TRUE' : 'FALSE') . "</code>";
            ?>
        </div>
        
        <!-- array_search() -->
        <div class="function-card">
            <div class="function-title">7. array_search() - Mencari Key dari Nilai</div>
            <?php
            $warna = array("merah" => "#FF0000", "hijau" => "#00FF00", "biru" => "#0000FF");
            $key = array_search("#00FF00", $warna);
            echo "<code>array_search('#00FF00', \$warna) = '$key'</code>";
            ?>
        </div>
    </div>
</body>
</html>