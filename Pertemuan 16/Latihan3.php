<?php
// PERBAIKAN: Pastikan session_start() dijalankan sebelum ada tag HTML apa pun [cite: 139]
session_start();
?>
<html>
<head>
    <title>Latihan Error Handling Session HTML</title>
</head>
<body>
    <p>Session berhasil dijalankan tanpa error headers already sent.</p>
</body>
</html>