<?php
require_once "config.php";

// -----------------------------------------------------------
// Mengubah nama hari Inggris (hasil date()) ke Bahasa Indonesia
// -----------------------------------------------------------
function namaHariIndo($tanggal) {
    $hari_en = date("l", strtotime($tanggal));
    $map = [
        "Monday"    => "Senin",
        "Tuesday"   => "Selasa",
        "Wednesday" => "Rabu",
        "Thursday"  => "Kamis",
        "Friday"    => "Jumat",
        "Saturday"  => "Sabtu",
        "Sunday"    => "Minggu",
    ];
    return $map[$hari_en];
}

// -----------------------------------------------------------
// LOGIKA KAPASITAS PENDAFTARAN
// Kapasitas 1 hari maksimal 5 orang.
// Jika tanggal yang diminta sudah penuh (>=5 pendaftar),
// maka otomatis digeser ke hari berikutnya, dst.
// Jam ditentukan berdasarkan urutan slot pada hari tsb.
// -----------------------------------------------------------
function cariJadwalTersedia($conn, $tglMulai, $excludeId = null) {
    $slotJam = ["09:00:00", "10:00:00", "11:00:00", "13:00:00", "14:00:00"];
    $kapasitas = count($slotJam); // 5 orang/hari

    $tanggalCek = $tglMulai;

    while (true) {
        if ($excludeId) {
            $sql = "SELECT COUNT(*) AS jumlah FROM pendaftar WHERE tanggal = ? AND no_daftar != ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "si", $tanggalCek, $excludeId);
        } else {
            $sql = "SELECT COUNT(*) AS jumlah FROM pendaftar WHERE tanggal = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $tanggalCek);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $jumlah = (int) $row["jumlah"];

        if ($jumlah < $kapasitas) {
            // Masih ada slot tersedia di tanggal ini
            $jam = $slotJam[$jumlah];
            $hari = namaHariIndo($tanggalCek);
            return [
                "hari"    => $hari,
                "tanggal" => $tanggalCek,
                "jam"     => $jam,
            ];
        }

        // Sudah penuh -> geser ke hari berikutnya
        $tanggalCek = date("Y-m-d", strtotime($tanggalCek . " +1 day"));
    }
}

// -----------------------------------------------------------
// Generate No. Antrian otomatis untuk hari tertentu
// Format: ANT-YYYYMMDD-XXX
// -----------------------------------------------------------
function generateNoAntrian($conn, $tanggal) {
    $prefix = "ANT-" . date("Ymd", strtotime($tanggal)) . "-";
    $sql = "SELECT COUNT(*) AS jumlah FROM daftar_ulang WHERE tgl_datang = ? AND keterangan = 'OK'";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $tanggal);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $urutan = (int) $row["jumlah"] + 1;
    return $prefix . str_pad($urutan, 3, "0", STR_PAD_LEFT);
}
?>
