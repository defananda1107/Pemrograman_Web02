<!DOCTYPE html>
<html>
<head>
    <title>Latihan 3 - Default Parameter</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 900px;
            margin: 0 auto;
        }
        h2 {
            color: #2c7a7b;
            border-bottom: 3px solid #38b2ac;
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
            border-left: 5px solid #2c7a7b;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .comparison {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        .comparison-item {
            flex: 1;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        ol {
            margin: 10px 0;
            padding-left: 25px;
        }
        li {
            padding: 5px 0;
        }
        .list-container {
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            background: white;
        }
        code {
            background-color: #2d3748;
            color: #fbd38d;
            padding: 3px 8px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
        }
        .note {
            background-color: #fef5e7;
            border-left: 4px solid #f39c12;
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>⚙️ Latihan 3: Fungsi dengan Default Parameter</h2>
        
        <div class="code-box">
            &lt;?php<br>
            function repeat($text, $num = 10)<br>
            {<br>
            &nbsp;&nbsp;echo "&lt;ol&gt;\r\n";<br>
            &nbsp;&nbsp;for($i = 0; $i &lt; $num; $i++)<br>
            &nbsp;&nbsp;{<br>
            &nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;li&gt;$text &lt;/li&gt;\r\n";<br>
            &nbsp;&nbsp;}<br>
            &nbsp;&nbsp;echo "&lt;/ol&gt;";<br>
            }<br>
            // calling repeat with two arguments<br>
            repeat("I'm the best", 15);<br>
            // calling repeat with just one argument<br>
            repeat("You're the man");<br>
            ?&gt;
        </div>
        
        <?php
        // Definisi fungsi repeat dengan default parameter
        function repeat($text, $num = 10)
        {
            echo "<ol>\r\n";
            for($i = 0; $i < $num; $i++)
            {
                echo "<li>$text </li>\r\n";
            }
            echo "</ol>";
        }
        ?>
        
        <h3>📤 Output:</h3>
        
        <div class="comparison">
            <div class="comparison-item">
                <h4>Dengan 2 Argumen:</h4>
                <code>repeat("I'm the best", 15);</code>
                <div class="list-container">
                    <?php repeat("I'm the best", 15); ?>
                </div>
            </div>
            <div class="comparison-item">
                <h4>Dengan 1 Argumen (Default):</h4>
                <code>repeat("You're the man");</code>
                <div class="list-container">
                    <?php repeat("You're the man"); ?>
                </div>
            </div>
        </div>
        
        <div class="note">
            <strong>💡 Catatan:</strong> Pada pemanggilan kedua, parameter <code>$num</code> tidak diberikan, 
            sehingga menggunakan nilai default yaitu <code>10</code>.
        </div>
        
        <h3>📚 Contoh Tambahan - Variasi Default Parameter:</h3>
        
        <?php
        // Contoh 1: Fungsi dengan multiple default parameter
        echo "<h4>1. Multiple Default Parameters:</h4>";
        
        function buatKartu($nama, $ucapan = "Selamat Datang", $warna = "biru") {
            $bgColor = $warna == "biru" ? "#ebf8ff" : ($warna == "hijau" ? "#f0fff4" : "#fffaf0");
            $borderColor = $warna == "biru" ? "#3182ce" : ($warna == "hijau" ? "#38a169" : "#dd6b20");
            
            echo "<div style='background:$bgColor; border-left:5px solid $borderColor; padding:15px; margin:10px 0; border-radius:0 8px 8px 0;'>";
            echo "<strong>$ucapan, $nama!</strong>";
            echo "</div>";
        }
        
        echo "<div class='output-box'>";
        buatKartu("KHOIRUL");                          // Gunakan semua default
        buatKartu("Ani", "Selamat Pagi");           // Gunakan default warna
        buatKartu("Citra", "Selamat Sore", "hijau"); // Semua parameter diisi
        echo "</div>";
        
        // Contoh 2: Default parameter dengan array
        echo "<h4>2. Default Parameter dengan Array:</h4>";
        
        function tampilMenu($items = ["Home", "Profil", "Kontak"]) {
            echo "<ul style='background:#f7fafc; padding:15px 30px; border-radius:8px;'>";
            foreach ($items as $item) {
                echo "<li style='padding:5px;'>$item</li>";
            }
            echo "</ul>";
        }
        
        echo "<div class='comparison'>";
        echo "<div class='comparison-item'>";
        echo "<strong>Default Menu:</strong><br>";
        tampilMenu();
        echo "</div>";
        echo "<div class='comparison-item'>";
        echo "<strong>Custom Menu:</strong><br>";
        tampilMenu(["Dashboard", "Laporan", "Pengaturan", "Logout"]);
        echo "</div>";
        echo "</div>";
        
        // Contoh 3: Fungsi dengan parameter opsional di akhir
        echo "<h4>3. Parameter Opsional di Berbagai Posisi:</h4>";
        
        function formatTanggal($hari, $bulan, $tahun, $pemisah = "-") {
            return "$hari$pemisah$bulan$pemisah$tahun";
        }
        
        echo "<div class='output-box'>";
        echo "Default (-): " . formatTanggal("18", "11", "2010") . "<br>";
        echo "Custom (/): " . formatTanggal("18", "11", "2010", "/") . "<br>";
        echo "Custom (.): " . formatTanggal("18", "11", "2010", ".") . "<br>";
        echo "</div>";
        
        // Contoh 4: Fungsi repeat dengan variasi
        echo "<h4>4. Variasi Fungsi repeat():</h4>";
        
        function repeatWithStyle($text, $num = 5, $tag = "li", $class = "") {
            $classAttr = $class ? " class='$class'" : "";
            echo "<ul>";
            for($i = 0; $i < $num; $i++) {
                echo "<$tag$classAttr>$text ($i)</$tag>";
            }
            echo "</ul>";
        }
        
        echo "<div class='comparison'>";
        echo "<div class='comparison-item'>";
        echo "<strong>Default (li, 5x):</strong><br>";
        repeatWithStyle("Item");
        echo "</div>";
        echo "<div class='comparison-item'>";
        echo "<strong>Custom (div, 3x, styled):</strong><br>";
        repeatWithStyle("⭐ Item", 3, "div", "style='padding:5px; background:#fef5e7; margin:2px;'");
        echo "</div>";
        echo "</div>";
        ?>
        
        <h3>📝 Aturan Default Parameter:</h3>
        <ul>
            <li>Parameter dengan nilai default harus diletakkan <strong>di akhir</strong> daftar parameter</li>
            <li>Contoh benar: <code>function test($a, $b = 10)</code></li>
            <li>Contoh salah: <code>function test($a = 10, $b)</code></li>
            <li>Default parameter sangat berguna untuk membuat fungsi yang fleksibel</li>
            <li>Nilai default bisa berupa: string, number, array, null, dll.</li>
        </ul>
        
        <h3>📊 Ringkasan Jenis Fungsi dalam PHP:</h3>
        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tr style="background:#38b2ac; color:white;">
                <th style="padding:10px;">Jenis Fungsi</th>
                <th style="padding:10px;">Deskripsi</th>
                <th style="padding:10px;">Contoh</th>
            </tr>
            <tr>
                <td style="padding:10px;"><strong>Built-In</strong></td>
                <td>Fungsi bawaan PHP</td>
                <td><code>strlen(), date(), count()</code></td>
            </tr>
            <tr style="background:#f7fafc;">
                <td style="padding:10px;"><strong>UDF</strong></td>
                <td>Fungsi buatan sendiri</td>
                <td><code>function jumlah(){}</code></td>
            </tr>
            <tr>
                <td style="padding:10px;"><strong>External</strong></td>
                <td>Fungsi dari library/ekstensi</td>
                <td><code>mysqli_connect(), GD library</code></td>
            </tr>
        </table>
    </div>
</body>
</html>