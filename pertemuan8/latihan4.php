<!DOCTYPE html>
<html>
<head>
    <title>Latihan Bonus - Konsep Function Lengkap</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐘 Konsep Function dalam PHP</h1>
        
        <!-- 1. Basic Function -->
        <div class="function-card">
            <div class="function-title">1. Basic Function (Tanpa Parameter)</div>
            <?php
            function sapaDunia() {
                echo "Hello World!";
            }
            echo "<code>function sapaDunia() { echo 'Hello World!'; }</code><br>";
            echo "<div class='output'>"; sapaDunia(); echo "</div>";
            ?>
        </div>
        
        <!-- 2. Function dengan Parameter -->
        <div class="function-card">
            <div class="function-title">2. Function dengan Parameter</div>
            <?php
            function sapa($nama) {
                return "Halo, $nama!";
            }
            echo "<code>function sapa(\$nama) { return \"Halo, \$nama!\"; }</code><br>";
            echo "<div class='output'>" . sapa("Khoirul") . "<br>" . sapa("Ani") . "</div>";
            ?>
        </div>
        
        <!-- 3. Function dengan Return Value -->
        <div class="function-card">
            <div class="function-title">3. Function dengan Return Value</div>
            <?php
            function luasLingkaran($r) {
                return 3.14 * $r * $r;
            }
            echo "<code>function luasLingkaran(\$r) { return 3.14 * \$r * \$r; }</code><br>";
            echo "<div class='output'>Luas lingkaran dengan r=5: " . luasLingkaran(5) . "</div>";
            ?>
        </div>
        
        <!-- 4. Function dengan Default Parameter -->
        <div class="function-card">
            <div class="function-title">4. Function dengan Default Parameter</div>
            <?php
            function pangkat($angka, $pangkat = 2) {
                return pow($angka, $pangkat);
            }
            echo "<code>function pangkat(\$angka, \$pangkat = 2) { return pow(\$angka, \$pangkat); }</code><br>";
            echo "<div class='output'>";
            echo "pangkat(5) = " . pangkat(5) . " (default pangkat 2)<br>";
            echo "pangkat(5, 3) = " . pangkat(5, 3);
            echo "</div>";
            ?>
        </div>
        
        <!-- 5. Function dengan Type Hinting -->
        <div class="function-card">
            <div class="function-title">5. Function dengan Type Hinting (PHP 7+)</div>
            <?php
            function tambahArray(array $arr): int {
                return array_sum($arr);
            }
            echo "<code>function tambahArray(array \$arr): int { return array_sum(\$arr); }</code><br>";
            echo "<div class='output'>";
            echo "tambahArray([1,2,3,4,5]) = " . tambahArray([1,2,3,4,5]);
            echo "</div>";
            ?>
        </div>
        
        <!-- 6. Variable Scope -->
        <div class="function-card">
            <div class="function-title">6. Variable Scope (Global vs Local)</div>
            <?php
            $globalVar = "Saya global";
            
            function testScope() {
                $localVar = "Saya local";
                global $globalVar;
                echo "Inside function: globalVar = $globalVar, localVar = $localVar<br>";
            }
            
            echo "<code>";
            echo "\$globalVar = 'Saya global';<br>";
            echo "function testScope() { global \$globalVar; ... }";
            echo "</code><br>";
            echo "<div class='output'>";
            testScope();
            echo "Outside function: globalVar = $globalVar";
            echo "</div>";
            ?>
        </div>
        
        <!-- 7. Static Variable -->
        <div class="function-card">
            <div class="function-title">7. Static Variable</div>
            <?php
            function counter() {
                static $count = 0;
                $count++;
                return $count;
            }
            echo "<code>";
            echo "function counter() { static \$count = 0; \$count++; return \$count; }";
            echo "</code><br>";
            echo "<div class='output'>";
            echo "counter() = " . counter() . "<br>";
            echo "counter() = " . counter() . "<br>";
            echo "counter() = " . counter();
            echo "</div>";
            ?>
        </div>
        
        <!-- 8. Anonymous Function -->
        <div class="function-card">
            <div class="function-title">8. Anonymous Function (Closure)</div>
            <?php
            $kaliDua = function($x) {
                return $x * 2;
            };
            echo "<code>\$kaliDua = function(\$x) { return \$x * 2; };</code><br>";
            echo "<div class='output'>";
            echo "\$kaliDua(5) = " . $kaliDua(5) . "<br>";
            echo "\$kaliDua(10) = " . $kaliDua(10);
            echo "</div>";
            ?>
        </div>
        
        <!-- 9. Arrow Function (PHP 7.4+) -->
        <div class="function-card">
            <div class="function-title">9. Arrow Function (PHP 7.4+)</div>
            <?php
            $kaliTiga = fn($x) => $x * 3;
            echo "<code>\$kaliTiga = fn(\$x) => \$x * 3;</code><br>";
            echo "<div class='output'>";
            echo "\$kaliTiga(5) = " . $kaliTiga(5);
            echo "</div>";
            ?>
        </div>
        
        <!-- 10. Recursive Function -->
        <div class="function-card">
            <div class="function-title">10. Recursive Function</div>
            <?php
            function faktorial($n) {
                if ($n <= 1) return 1;
                return $n * faktorial($n - 1);
            }
            echo "<code>function faktorial(\$n) { if(\$n<=1) return 1; return \$n * faktorial(\$n-1); }</code><br>";
            echo "<div class='output'>";
            echo "faktorial(5) = " . faktorial(5);
            echo "</div>";
            ?>
        </div>
        
        <!-- Ringkasan Built-in Functions -->
        <h2>📚 Contoh Built-in Functions:</h2>
        <table>
            <tr><th>Kategori</th><th>Fungsi</th><th>Contoh</th><th>Hasil</th></tr>
            <tr>
                <td>String</td>
                <td><code>strlen()</code></td>
                <td><code>strlen("Hello")</code></td>
                <td><?php echo strlen("Hello"); ?></td>
            </tr>
            <tr>
                <td>String</td>
                <td><code>strtoupper()</code></td>
                <td><code>strtoupper("hello")</code></td>
                <td><?php echo strtoupper("hello"); ?></td>
            </tr>
            <tr>
                <td>Matematik</td>
                <td><code>sqrt()</code></td>
                <td><code>sqrt(16)</code></td>
                <td><?php echo sqrt(16); ?></td>
            </tr>
            <tr>
                <td>Matematik</td>
                <td><code>round()</code></td>
                <td><code>round(3.7)</code></td>
                <td><?php echo round(3.7); ?></td>
            </tr>
            <tr>
                <td>Array</td>
                <td><code>count()</code></td>
                <td><code>count([1,2,3])</code></td>
                <td><?php echo count([1,2,3]); ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><code>date()</code></td>
                <td><code>date("d-m-Y")</code></td>
                <td><?php echo date("d-m-Y"); ?></td>
            </tr>
        </table>
        
        <h3>📝 Aturan Penamaan Fungsi:</h3>
        <ul>
            <li>Diawali dengan keyword <code>function</code></li>
            <li>Tidak boleh sama dengan fungsi built-in PHP</li>
            <li>Bisa terdiri dari huruf, angka, dan underscore</li>
            <li>Tidak boleh diawali dengan angka</li>
            <li>Bersifat <strong>case-insensitive</strong> (tidak membedakan huruf besar/kecil)</li>
        </ul>
    </div>
</body>
</html>