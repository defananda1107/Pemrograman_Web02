<?php
require_once "functions.php";

$page = "pengurusan";

// ================= HAPUS =================
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pengurusan WHERE id = $id");
    header("Location: pengurusan.php");
    exit;
}

// ================= PROSES BERKAS (INSERT) =================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noAntrian = trim($_POST['no_antrian']);

    $q = mysqli_query($conn, "SELECT * FROM daftar_ulang WHERE no_antrian = '" . mysqli_real_escape_string($conn, $noAntrian) . "'");
    $du = mysqli_fetch_assoc($q);

    if ($du) {
        $lengkap = ($du['ktp'] === 'Ada' && $du['kk'] === 'Ada' && $du['ijazah_akte'] === 'Ada');

        if ($lengkap) {
            $berkas     = "Lengkap";
            $status     = "Diterima";
            $keterangan = "OK";
            $pembayaran = 355000;
        } else {
            $berkas     = "Tidak Lengkap";
            $status     = "Ditolak";
            $keterangan = "Tidak";
            $pembayaran = 0;
        }

        $stmt = mysqli_prepare($conn, "INSERT INTO pengurusan (no_antrian, no_daftar, nama_pemohon, berkas, status, keterangan, pembayaran) VALUES (?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sissssi", $noAntrian, $du['no_daftar'], $du['nama_pemohon'], $berkas, $status, $keterangan, $pembayaran);
        mysqli_stmt_execute($stmt);
    }
    header("Location: pengurusan.php?sukses=1");
    exit;
}

require_once "header.php";

// No. Antrian yang sudah OK di daftar ulang tapi BELUM diproses di pengurusan
$listAntrian = mysqli_query($conn, "
    SELECT du.no_antrian, du.nama_pemohon FROM daftar_ulang du
    WHERE du.keterangan = 'OK'
    AND du.no_antrian NOT IN (SELECT no_antrian FROM pengurusan)
    ORDER BY du.no_antrian ASC
");
?>

<h3 class="section-title">Pengurusan Berkas</h3>

<?php if (isset($_GET['sukses'])): ?>
    <div class="alert alert-success">Berkas berhasil diproses.</div>
<?php endif; ?>

<form class="form-box" method="POST" action="pengurusan.php">
    <label>Pilih No. Antrian (yang sudah lolos Daftar Ulang)</label>
    <select name="no_antrian" required>
        <option value="">-- Pilih No. Antrian --</option>
        <?php while ($a = mysqli_fetch_assoc($listAntrian)): ?>
            <option value="<?php echo $a['no_antrian']; ?>"><?php echo $a['no_antrian'] . " - " . htmlspecialchars($a['nama_pemohon']); ?></option>
        <?php endwhile; ?>
    </select>
    <button type="submit" class="btn">Proses Berkas</button>
</form>

<div class="alert alert-info">
    Jika KTP, KK, dan Ijazah/Akte semua <strong>Ada</strong> &rarr; Berkas = <strong>Lengkap</strong>, Status = <strong>Diterima</strong>, Keterangan = <strong>OK</strong>, Pembayaran = <strong>Rp355.000</strong>.
    Jika ada salah satu yang <strong>Tidak</strong> &rarr; Berkas = <strong>Tidak Lengkap</strong>, Status = <strong>Ditolak</strong>, Pembayaran = <strong>Rp0</strong>.
</div>

<h3 class="section-title">Data Pengurusan Paspor</h3>
<table>
    <tr>
        <th>No. Antrian</th>
        <th>No. Daftar</th>
        <th>Nama Pemohon</th>
        <th>Berkas</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Pembayaran</th>
        <th>Action</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM pengurusan ORDER BY id DESC");
    $totalPendapatan = 0;
    if (mysqli_num_rows($res) === 0) {
        echo '<tr><td colspan="8" style="text-align:center;color:#888">Belum ada data pengurusan</td></tr>';
    }
    while ($row = mysqli_fetch_assoc($res)) {
        $ketClass = $row['status'] === 'Diterima' ? 'badge-ok' : 'badge-no';
        if ($row['status'] === 'Diterima') $totalPendapatan += $row['pembayaran'];
        echo "<tr>";
        echo "<td>" . $row['no_antrian'] . "</td>";
        echo "<td>D-" . str_pad($row['no_daftar'], 4, '0', STR_PAD_LEFT) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_pemohon']) . "</td>";
        echo "<td>" . $row['berkas'] . "</td>";
        echo "<td class='$ketClass'>" . $row['status'] . "</td>";
        echo "<td>" . $row['keterangan'] . "</td>";
        echo "<td>Rp" . number_format($row['pembayaran'], 0, ',', '.') . "</td>";
        echo "<td><a href='pengurusan.php?hapus={$row['id']}' onclick=\"return confirm('Hapus data ini?')\">hapus</a></td>";
        echo "</tr>";
    }
    ?>
</table>

<div class="pendapatan-box">
    Total Pendapatan: Rp<?php echo number_format($totalPendapatan, 0, ',', '.'); ?>
</div>

<?php require_once "footer.php"; ?>
