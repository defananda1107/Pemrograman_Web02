<!DOCTYPE html>
<html>
<head>
    <title>Latihan 1 - Basic Function</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #4a5568;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .code-box {
            background-color: #2d3748;
            color: #fbd38d;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
        }
        .output-box {
            background: linear-gradient(135deg, #e6fffa 0%, #b2f5ea 100%);
            border-left: 5px solid #38b2ac;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .result {
            font-size: 24px;
            font-weight: bold;
            color: #2c7a7b;
            text-align: center;
        }
        code {
            background-color: #2d3748;
            color: #fbd38d;
            padding: 3px 8px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔧 Latihan 1: Basic Function dengan Parameter</h2>
        
        <div class="code-box">
            &lt;?php<br>
            &nbsp;&nbsp;function basic($argument)<br>
            &nbsp;&nbsp;{<br>
            &nbsp;&nbsp;&nbsp;&nbsp;echo $argument;<br>
            &nbsp;&nbsp;}<br>
            &nbsp;&nbsp;basic('hello world!');<br>
            ?&gt;
        </div>
        
        <div class="output-box">
            <h3>📤 Output:</h3>
            <div class="result">
                <?php
                function basic($argument)
                {
                    echo $argument;
                }
                basic('hello world!');
                ?>
            </div>
        </div>
        
        <h3>📚 Contoh Tambahan - Variasi Fungsi:</h3>
        
        <?php
        // Fungsi tanpa parameter
        echo "<h4>1. Fungsi Tanpa Parameter:</h4>";
        function sapa() {
            echo "<div class='output-box' style='padding:10px;'>👋 Hello, selamat datang!</div>";
        }
        sapa();
        
        // Fungsi dengan multiple parameter
        echo "<h4>2. Fungsi dengan Multiple Parameter:</h4>";
        function perkenalan($nama, $umur, $kota) {
            echo "<div class='output-box' style='padding:10px;'>";
            echo "Nama saya <strong>$nama</strong>, umur <strong>$umur</strong> tahun, dari <strong>$kota</strong>.";
            echo "</div>";
        }
        perkenalan("KHOIRUL UMAM", 22, "Rangkasbitung");
        perkenalan("Ani", 23, "Bandung");
        
        // Fungsi dengan return value
        echo "<h4>3. Fungsi dengan Return Value:</h4>";
        function tambah($a, $b) {
            return $a + $b;
        }
        $hasil = tambah(10, 20);
        echo "<div class='output-box' style='padding:10px;'>";
        echo "10 + 20 = <strong>$hasil</strong>";
        echo "</div>";
        
        // Fungsi dengan tipe data (PHP 7+)
        echo "<h4>4. Fungsi dengan Type Hinting:</h4>";
        function kali(int $a, int $b): int {
            return $a * $b;
        }
        echo "<div class='output-box' style='padding:10px;'>";
        echo "5 × 8 = <strong>" . kali(5, 8) . "</strong>";
        echo "</div>";
        ?>
        
        <h3>📝 Penjelasan:</h3>
        <ul>
            <li><code>function</code> adalah keyword untuk membuat fungsi</li>
            <li>Parameter ditulis dalam kurung <code>( )</code> setelah nama fungsi</li>
            <li>Fungsi dipanggil dengan menuliskan namanya diikuti kurung <code>( )</code></li>
            <li>Parameter bisa lebih dari satu, dipisahkan dengan koma</li>
            <li>Fungsi bisa mengembalikan nilai dengan <code>return</code></li>
        </ul>
    </div>
</body>
</html>