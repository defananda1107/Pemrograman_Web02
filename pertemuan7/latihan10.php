<!DOCTYPE html>
<html>
<head>
    <title>Latihan 10 - in_array() dengan Type Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 30px;
            background: linear-gradient(135deg, #ffe259 0%, #ffa751 100%);
            min-height: 100vh;
        }
        .container {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 900px;
            margin: 0 auto;
        }
        h2 {
            color: #c05621;
            border-bottom: 3px solid #ed8936;
            padding-bottom: 10px;
        }
        .result-box {
            background: linear-gradient(135deg, #fffaf0 0%, #fef3c7 100%);
            border-left: 5px solid #c05621;
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
            border: 1px solid #fbd38d;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #c05621;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #fffaf0;
        }
        .comparison-box {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        .comparison-item {
            flex: 1;
            padding: 15px;
            border-radius: 10px;
            background-color: #f7fafc;
        }
        .strict-true {
            border: 2px solid #38a169;
        }
        .strict-false {
            border: 2px solid #e53e3e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔬 Latihan 10: in_array() dengan Pemeriksaan Tipe Data (Strict Mode)</h2>
        
        <?php
        echo "<div class='result-box'>";
        
        $tipe = array('1.10', 5.0, 1.13);
        
        echo "<strong>Isi Array \$tipe:</strong> ";
        echo "<pre style='background:#1a202c; color:#68d391; padding:10px; border-radius:5px;'>";
        echo "\$tipe = array('1.10', 5.0, 1.13);\n";
        echo "// '1.10' → String\n";
        echo "// 5.0    → Float/Double\n";
        echo "// 1.13   → Float/Double";
        echo "</pre>";
        
        // Pencarian 1: String '5.0' dengan strict = TRUE
        echo "<h3>Pencarian 1:</h3>";
        echo "<code>in_array('5.0', \$tipe, TRUE)</code><br><br>";
        
        if (in_array('5.0', $tipe, TRUE)) {
            echo "<span class='true'>✓ String \"5.0\" ada di dalam array</span>";
        } else {
            echo "<span class='false'>✗ String \"5.0\" tidak ada di dalam array</span>";
        }
        echo " <em>(Mencari string '5.0', tapi di array ada float 5.0)</em>";
        
        echo "<br><br>";
        
        // Pencarian 2: Float 1.13 dengan strict = TRUE
        echo "<h3>Pencarian 2:</h3>";
        echo "<code>in_array(1.13, \$tipe, TRUE)</code><br><br>";
        
        if (in_array(1.13, $tipe, TRUE)) {
            echo "<span class='true'>✓ Bilangan 1.13 ada di dalam array</span>";
        } else {
            echo "<span class='false'>✗ Bilangan 1.13 tidak ada di dalam array</span>";
        }
        echo " <em>(Mencari float 1.13, di array ada float 1.13)</em>";
        
        echo "</div>";
        
        // Perbandingan Strict vs Non-Strict
        echo "<h3>📊 Perbandingan: Strict Mode (TRUE) vs Non-Strict Mode (FALSE/default)</h3>";
        
        echo "<div class='comparison-box'>";
        
        // Non-Strict Mode
        echo "<div class='comparison-item'>";
        echo "<h4 style='margin-top:0;'>Non-Strict Mode</h4>";
        echo "<code>in_array('5.0', \$tipe)</code><br><br>";
        
        if (in_array('5.0', $tipe)) {
            echo "<span class='true'>✓ Ditemukan!</span><br>";
            echo "<small>String '5.0' dianggap sama dengan float 5.0</small>";
        } else {
            echo "<span class='false'>✗ Tidak ditemukan</span>";
        }
        echo "</div>";
        
        // Strict Mode
        echo "<div class='comparison-item strict-false'>";
        echo "<h4 style='margin-top:0;'>Strict Mode</h4>";
        echo "<code>in_array('5.0', \$tipe, TRUE)</code><br><br>";
        
        if (in_array('5.0', $tipe, TRUE)) {
            echo "<span class='true'>✓ Ditemukan!</span>";
        } else {
            echo "<span class='false'>✗ Tidak ditemukan!</span><br>";
            echo "<small>Tipe data berbeda: string vs float</small>";
        }
        echo "</div>";
        
        echo "</div>";
        
        // Tabel perbandingan lengkap
        echo "<h3>📋 Tabel Perbandingan Lengkap:</h3>";
        echo "<table>";
        echo "<tr><th>Pencarian</th><th>Tipe Data</th><th>Non-Strict</th><th>Strict (TRUE)</th><th>Keterangan</th></tr>";
        
        $testCases = [
            ['5.0', 'string'],
            [5.0, 'float'],
            ['1.10', 'string'],
            [1.10, 'float'],
            [1.13, 'float'],
            ['1.13', 'string']
        ];
        
        foreach ($testCases as $test) {
            $value = $test[0];
            $type = $test[1];
            
            $nonStrict = in_array($value, $tipe) ? '✓' : '✗';
            $strict = in_array($value, $tipe, TRUE) ? '✓' : '✗';
            
            $ket = '';
            if ($type == 'string' && $value == '5.0') $ket = 'String vs Float 5.0';
            elseif ($type == 'float' && $value == 5.0) $ket = 'Float 5.0 ditemukan';
            elseif ($type == 'string' && $value == '1.10') $ket = 'String "1.10" ada di array';
            elseif ($type == 'float' && $value == 1.10) $ket = 'Float 1.10 vs String "1.10"';
            elseif ($type == 'float' && $value == 1.13) $ket = 'Float 1.13 ditemukan';
            else $ket = 'String "1.13" vs Float 1.13';
            
            echo "<tr>";
            echo "<td><code>" . var_export($value, true) . "</code></td>";
            echo "<td>$type</td>";
            echo "<td class='" . ($nonStrict == '✓' ? 'true' : 'false') . "'>$nonStrict</td>";
            echo "<td class='" . ($strict == '✓' ? 'true' : 'false') . "'>$strict</td>";
            echo "<td>$ket</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Contoh tambahan dengan berbagai tipe data
        echo "<h3>🧪 Eksperimen dengan Berbagai Tipe Data:</h3>";
        
        $campuran = array(1, '1', true, 0, '0', false, null);
        
        echo "<div class='result-box'>";
        echo "<strong>Array Campuran:</strong><br>";
        echo "<code>\$campuran = array(1, '1', true, 0, '0', false, null);</code><br><br>";
        
        echo "<table>";
        echo "<tr><th>Pencarian</th><th>Non-Strict</th><th>Strict (TRUE)</th><th>Penjelasan</th></tr>";
        
        $tests = [
            [1, 'integer 1'],
            ['1', 'string "1"'],
            [true, 'boolean true'],
            [0, 'integer 0'],
            ['0', 'string "0"'],
            [false, 'boolean false'],
            [null, 'NULL']
        ];
        
        foreach ($tests as $t) {
            $val = $t[0];
            $desc = $t[1];
            
            $ns = in_array($val, $campuran) ? '✓' : '✗';
            $st = in_array($val, $campuran, TRUE) ? '✓' : '✗';
            
            $explain = '';
            if ($val === 1) $explain = 'Non-strict: 1 == true == "1"';
            elseif ($val === '1') $explain = 'Non-strict: "1" == 1 == true';
            elseif ($val === true) $explain = 'Non-strict: true == 1';
            elseif ($val === 0) $explain = 'Non-strict: 0 == false == "0" == null';
            elseif ($val === '0') $explain = 'Non-strict: "0" == 0 == false';
            elseif ($val === false) $explain = 'Non-strict: false == 0 == null';
            else $explain = 'Non-strict: null == false == 0';
            
            echo "<tr>";
            echo "<td><code>" . var_export($val, true) . "</code> ($desc)</td>";
            echo "<td class='" . ($ns == '✓' ? 'true' : 'false') . "'>$ns</td>";
            echo "<td class='" . ($st == '✓' ? 'true' : 'false') . "'>$st</td>";
            echo "<td><small>$explain</small></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        ?>
        
        <h3>📝 Kesimpulan:</h3>
        <ul>
            <li><strong>Non-Strict Mode</strong> (default): Hanya membandingkan nilai, tipe data bisa berbeda</li>
            <li><strong>Strict Mode</strong> (<code>TRUE</code>): Membandingkan nilai DAN tipe data harus sama</li>
            <li>Gunakan Strict Mode untuk validasi yang lebih ketat dan akurat</li>
            <li>Sintaks: <code>in_array($cari, $array, TRUE)</code></li>
            <li>Sangat penting untuk menghindari bug akibat konversi tipe data otomatis PHP</li>
        </ul>
    </div>
</body>
</html>