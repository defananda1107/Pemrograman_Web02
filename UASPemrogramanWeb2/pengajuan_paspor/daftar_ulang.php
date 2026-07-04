<?php
require_once "functions.php";

$page = "daftar_ulang";
$editData = null;

// ================= HAPUS =================
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM daftar_ulang WHERE no_daftar_ulang = $id");
    header("Location: daftar_ulang.php");
    exit;
}

// ================= AMBIL DATA UNTUK EDIT =================
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM daftar_ulang WHERE no_daftar_ulang = $id");
    $editData = mysqli_fetch_assoc($res);
}

// ================= SIMPAN (INSERT / UPDATE) =================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noDaftar   = (int) $_POST['no_daftar'];
    $keperluan  = $_POST['keperluan'];
    $ktp        = $_POST['ktp'];
    $kk         = $_POST['kk'];
    $ijazah     = $_POST['ijazah_akte'];
    $hariDatang = $_POST['hari_datang'];
    $tglDatang  = $_POST['tgl_datang'];
    $idEdit     = isset($_POST['no_daftar_ulang']) && $_POST['no_daftar_ulang'] !== '' ? (int) $_POST['no_daftar_ulang'] : null;

    // Ambil data jadwal wajib (hari & tanggal harus datang) dari tabel pendaftar
    $q = mysqli_query($conn, "SELECT * FROM pendaftar WHERE no_daftar = $noDaftar");
    $pendaftar = mysqli_fetch_assoc($q);
    $namaPemohon    = $pendaftar['nama_pemohon'];
    $hariHarusDtg   = $pendaftar['hari'];
    $tglHarusDtg    = $pendaftar['tanggal'];

    // Keterangan OK hanya jika tanggal kedatangan SESUAI dengan jadwal wajib datang
    $keterangan = ($tglDatang === $tglHarusDtg) ? "OK" : "Tidak";

    // No Antrian otomatis hanya jika keterangan OK
    if ($keterangan === "OK") {
        // Jika sedang edit dan sudah OK sebelumnya, pertahankan no antrian lama
        $noAntrian = ($editData && $editData['keterangan'] === 'OK' && $editData['no_antrian'])
            ? $editData['no_antrian']
            : generateNoAntrian($conn, $tglDatang);
    } else {
        $noAntrian = null;
    }

    if ($idEdit) {
        $stmt = mysqli_prepare($conn, "UPDATE daftar_ulang SET no_daftar=?, nama_pemohon=?, keperluan=?, ktp=?, kk=?, ijazah_akte=?, hari_harus_datang=?, tgl_harus_datang=?, hari_datang=?, tgl_datang=?, keterangan=?, no_antrian=? WHERE no_daftar_ulang=?");
        mysqli_stmt_bind_param($stmt, "ssssssssssssi",
            $noDaftar, $namaPemohon, $keperluan, $ktp, $kk, $ijazah,
            $hariHarusDtg, $tglHarusDtg, $hariDatang, $tglDatang, $keterangan, $noAntrian, $idEdit);
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO daftar_ulang (no_daftar, nama_pemohon, keperluan, ktp, kk, ijazah_akte, hari_harus_datang, tgl_harus_datang, hari_datang, tgl_datang, keterangan, no_antrian) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssssssssssss",
            $noDaftar, $namaPemohon, $keperluan, $ktp, $kk, $ijazah,
            $hariHarusDtg, $tglHarusDtg, $hariDatang, $tglDatang, $keterangan, $noAntrian);
    }
    mysqli_stmt_execute($stmt);
    header("Location: daftar_ulang.php?sukses=1");
    exit;
}

require_once "header.php";

// Data untuk dropdown No. Daftar (lengkap dengan data-atribut agar bisa diisi otomatis lewat JS)
$listPendaftar = mysqli_query($conn, "SELECT * FROM pendaftar ORDER BY no_daftar DESC");
?>

<h3 class="section-title">Input Daftar Ulang</h3>

<?php if (isset($_GET['sukses'])): ?>
    <div class="alert alert-success">Data daftar ulang berhasil disimpan.</div>
<?php endif; ?>

<form class="form-box" method="POST" action="daftar_ulang.php" id="formDaftarUlang">
    <input type="hidden" name="no_daftar_ulang" value="<?php echo $editData['no_daftar_ulang'] ?? ''; ?>">

    <label>No. Daftar</label>
    <select name="no_daftar" id="no_daftar" required onchange="isiOtomatis()">
        <option value="">-- Pilih No. Daftar --</option>
        <?php
        mysqli_data_seek($listPendaftar, 0);
        while ($p = mysqli_fetch_assoc($listPendaftar)) {
            $selected = ($editData && $editData['no_daftar'] == $p['no_daftar']) ? 'selected' : '';
            echo "<option value='{$p['no_daftar']}' data-nama='" . htmlspecialchars($p['nama_pemohon']) . "' data-hari='{$p['hari']}' data-tanggal='{$p['tanggal']}' $selected>D-" . str_pad($p['no_daftar'], 4, '0', STR_PAD_LEFT) . " - " . htmlspecialchars($p['nama_pemohon']) . "</option>";
        }
        ?>
    </select>

    <label>Nama Pemohon</label>
    <input type="text" id="nama_pemohon" readonly value="<?php echo htmlspecialchars($editData['nama_pemohon'] ?? ''); ?>">

    <label>Keperluan</label>
    <select name="keperluan" required>
        <?php foreach (["Paspor Baru", "Perpanjangan", "Penggantian"] as $opt): ?>
            <option value="<?php echo $opt; ?>" <?php echo (($editData['keperluan'] ?? '') === $opt) ? 'selected' : ''; ?>><?php echo $opt; ?></option>
        <?php endforeach; ?>
    </select>

    <label>Hari Harus Datang</label>
    <input type="text" id="hari_harus_datang" readonly value="<?php echo $editData['hari_harus_datang'] ?? ''; ?>">

    <label>Tgl Harus Datang</label>
    <input type="text" id="tgl_harus_datang" readonly value="<?php echo isset($editData['tgl_harus_datang']) ? date('d-m-Y', strtotime($editData['tgl_harus_datang'])) : ''; ?>">

    <label>Hari Datang (aktual)</label>
    <select name="hari_datang" required>
        <?php foreach (["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"] as $h): ?>
            <option value="<?php echo $h; ?>" <?php echo (($editData['hari_datang'] ?? '') === $h) ? 'selected' : ''; ?>><?php echo $h; ?></option>
        <?php endforeach; ?>
    </select>

    <label>Tgl Datang (aktual)</label>
    <input type="date" name="tgl_datang" required value="<?php echo $editData['tgl_datang'] ?? date('Y-m-d'); ?>">

    <div class="checkbox-row">
        <label>Berkas:</label>
        <label>KTP:
            <select name="ktp">
                <option value="Ada" <?php echo (($editData['ktp'] ?? '') === 'Ada') ? 'selected' : ''; ?>>Ada</option>
                <option value="Tidak" <?php echo (($editData['ktp'] ?? '') === 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
            </select>
        </label>
        <label>KK:
            <select name="kk">
                <option value="Ada" <?php echo (($editData['kk'] ?? '') === 'Ada') ? 'selected' : ''; ?>>Ada</option>
                <option value="Tidak" <?php echo (($editData['kk'] ?? '') === 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
            </select>
        </label>
        <label>Ijazah/Akte:
            <select name="ijazah_akte">
                <option value="Ada" <?php echo (($editData['ijazah_akte'] ?? '') === 'Ada') ? 'selected' : ''; ?>>Ada</option>
                <option value="Tidak" <?php echo (($editData['ijazah_akte'] ?? '') === 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
            </select>
        </label>
    </div>

    <button type="submit" class="btn"><?php echo $editData ? 'Update Data' : 'Simpan'; ?></button>
    <?php if ($editData): ?>
        <a href="daftar_ulang.php" class="btn btn-secondary">Batal</a>
    <?php endif; ?>
</form>

<div class="alert alert-info">
    Keterangan otomatis <strong>OK</strong> jika "Tgl Datang" sama dengan "Tgl Harus Datang" (sesuai jadwal dari menu Daftar). Jika OK, No. Antrian akan dibuat otomatis.
</div>

<h3 class="section-title">Data Pendaftar Ulang</h3>
<table>
    <tr>
        <th>No. Daftar</th>
        <th>Nama Pemohon</th>
        <th>Keperluan</th>
        <th>KTP</th>
        <th>KK</th>
        <th>Ijazah/Akte</th>
        <th>Keterangan</th>
        <th>No. Antrian</th>
        <th>Action</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM daftar_ulang ORDER BY no_daftar_ulang DESC");
    if (mysqli_num_rows($res) === 0) {
        echo '<tr><td colspan="9" style="text-align:center;color:#888">Belum ada data daftar ulang</td></tr>';
    }
    while ($row = mysqli_fetch_assoc($res)) {
        $ketClass = $row['keterangan'] === 'OK' ? 'badge-ok' : 'badge-no';
        echo "<tr>";
        echo "<td>D-" . str_pad($row['no_daftar'], 4, '0', STR_PAD_LEFT) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_pemohon']) . "</td>";
        echo "<td>" . $row['keperluan'] . "</td>";
        echo "<td>" . $row['ktp'] . "</td>";
        echo "<td>" . $row['kk'] . "</td>";
        echo "<td>" . $row['ijazah_akte'] . "</td>";
        echo "<td class='$ketClass'>" . $row['keterangan'] . "</td>";
        echo "<td>" . ($row['no_antrian'] ?? '-') . "</td>";
        echo "<td>
                <a href='daftar_ulang.php?edit={$row['no_daftar_ulang']}'>edit</a> |
                <a href='daftar_ulang.php?hapus={$row['no_daftar_ulang']}' onclick=\"return confirm('Hapus data ini?')\">hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<script>
function isiOtomatis() {
    const select = document.getElementById('no_daftar');
    const opt = select.options[select.selectedIndex];
    document.getElementById('nama_pemohon').value = opt.getAttribute('data-nama') || '';
    document.getElementById('hari_harus_datang').value = opt.getAttribute('data-hari') || '';
    const tgl = opt.getAttribute('data-tanggal');
    if (tgl) {
        const d = new Date(tgl);
        document.getElementById('tgl_harus_datang').value = d.toLocaleDateString('id-ID');
    } else {
        document.getElementById('tgl_harus_datang').value = '';
    }
}
</script>

<?php require_once "footer.php"; ?>
