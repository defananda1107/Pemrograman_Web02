<!DOCTYPE html>
<html>
<head>
    <title>Latihan 4 - Penggunaan is_array()</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 700px;
            margin: 0 auto;
        }
        h2 {
            color: #4a5568;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .result-box {
            background-color: #f7fafc;
            border-left: 5px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 10px 10px 0;
        }
        .true {
            color: #38a169;
            font-weight: bold;
        }
        .false {
            color: #e53e3e;
            font-weight: bold;
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
            border: 1px solid #e2e8f0;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #667eea;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔍 Latihan 4: Fungsi is_array()</h2>
        
        <?php
        echo "<div class='result-box'>";
        
        // Array yang akan diperiksa
        $var = array(1, 2, 3, 4, 5, 6, 7);
        $scan = is_array($var);
        
        if ($scan == false) {
            $status = "bukan ";
        } else {
            $status = "";
        }
        
        echo "<code>\$var = array(1,2,3,4,5,6,7);</code>";
        echo "<br><br>";
        echo "Variabel <code>\$var</code> <strong class='" . ($scan ? 'true' : 'false') . "'>$status</strong>merupakan array";
        echo "<br><br>";
        echo "Hasil is_array(\$var) = <strong>" . ($scan ? 'TRUE' : 'FALSE') . "</strong>";
        
        echo "</div>";
        
        // Contoh tambahan - memeriksa berbagai tipe data
        echo "<h3>📊 Pemeriksaan Berbagai Tipe Data:</h3>";
        
        $test1 = array(1, 2, 3);           // array
        $test2 = "Hello World";            // string
        $test3 = 12345;                    // integer
        $test4 = 12.5;                     // float
        $test5 = true;                     // boolean
        $test6 = null;                     // null
        $test7 = array("nama" => "Budi");  // array asosiatif
        
        echo "<table>";
        echo "<tr><th>Variabel</th><th>Nilai</th><th>is_array()</th><th>Kesimpulan</th></tr>";
        
        $tests = [
            ['$test1', $test1],
            ['$test2', $test2],
            ['$test3', $test3],
            ['$test4', $test4],
            ['$test5', $test5],
            ['$test6', $test6],
            ['$test7', $test7]
        ];
        
        foreach ($tests as $test) {
            $name = $test[0];
            $value = $test[1];
            $result = is_array($value);
            
            echo "<tr>";
            echo "<td><code>$name</code></td>";
            echo "<td>";
            if (is_array($value)) {
                echo "<pre style='margin:0;'>" . print_r($value, true) . "</pre>";
            } else if (is_null($value)) {
                echo "NULL";
            } else if (is_bool($value)) {
                echo $value ? 'true' : 'false';
            } else {
                echo $value;
            }
            echo "</td>";
            echo "<td class='" . ($result ? 'true' : 'false') . "'>" . ($result ? 'TRUE' : 'FALSE') . "</td>";
            echo "<td>" . ($result ? '✓ Array' : '✗ Bukan Array') . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        ?>
        
        <h3>📝 Penjelasan:</h3>
        <ul>
            <li><code>is_array()</code> digunakan untuk memeriksa apakah sebuah variabel bertipe array</li>
            <li>Fungsi ini mengembalikan <code>TRUE</code> jika variabel adalah array</li>
            <li>Mengembalikan <code>FALSE</code> jika variabel bukan array</li>
            <li>Sintaks: <code>is_array($variabel)</code></li>
            <li>Berguna untuk validasi data sebelum melakukan operasi array</li>
        </ul>
    </div>
</body>
</html>