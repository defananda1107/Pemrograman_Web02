<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku Tamu</title>
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 900px;
            margin: auto;
        }
        h2 { color: #764ba2; text-align: center; }
        
        /* Styling untuk pesan koneksi */
        .status {
            text-align: center;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 20px;
        }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #764ba2; color: white; padding: 12px; }
        td { border-bottom: 1px solid #ddd; padding: 12px; text-align: left; }
        tr:hover { background-color: #f1f1f1; }

        /* Styling untuk link */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #764ba2;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .back-link:hover { background: #5a387d; }
    </style>
</head>
<body>

<div class="container">
    <p class="status">✓ Koneksi database berhasil!</p>
    <h2>Daftar Buku Tamu</h2>
    
    <table>
        <tr>
            <th>No</th><th>Nama</th><th>Email</th><th>Komentar</th><th>Tanggal</th>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM tamu ORDER BY id DESC");
        while($row = mysqli_fetch_array($data)){
            echo "<tr>
                    <td>$no</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['pesan']."</td>
                    <td>".$row['tanggal']."</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
    
    <a href="index.html" class="back-link">« Isi Buku Tamu Lagi</a>
</div>

</body>
</html>