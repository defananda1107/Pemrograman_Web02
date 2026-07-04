<?php
require_once "functions.php";

$page = "daftar";
$editData = null;

// ================= HAPUS =================
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pendaftar WHERE no_daftar = $id");
    header("Location: index.php");
    exit;
}

// ================= AMBIL DATA UNTUK EDIT =================
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM pendaftar WHERE no_daftar = $id");
    $editData = mysqli_fetch_assoc($res);
}

// ================= SIMPAN (INSERT / UPDATE) =================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama_pemohon']);
    $tglDaftar = $_POST['tgl_daftar'];
    $idEdit = isset($_POST['no_daftar']) && $_POST['no_daftar'] !== '' ? (int) $_POST['no_daftar'] : null;

    // Cari jadwal (hari, tanggal, jam) berdasarkan kapasitas 5 orang/hari
    $jadwal = cariJadwalTersedia($conn, $tglDaftar, $idEdit);

    if ($idEdit) {
        $stmt = mysqli_prepare($conn, "UPDATE pendaftar SET nama_pemohon=?, tgl_daftar=?, hari=?, tanggal=?, jam=? WHERE no_daftar=?");
        mysqli_stmt_bind_param($stmt, "sssssi", $nama, $tglDaftar, $jadwal['hari'], $jadwal['tanggal'], $jadwal['jam'], $idEdit);
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO pendaftar (nama_pemohon, tgl_daftar, hari, tanggal, jam) VALUES (?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $tglDaftar, $jadwal['hari'], $jadwal['tanggal'], $jadwal['jam']);
    }
    mysqli_stmt_execute($stmt);
    header("Location: index.php?sukses=1");
    exit;
}

require_once "header.php";
?>

<h3 class="section-title">Input Pendaftaran</h3>

<?php if (isset($_GET['sukses'])): ?>
    <div class="alert alert-success">Data pendaftaran berhasil disimpan. Jadwal kedatangan otomatis ditentukan berdasarkan kapasitas (maks. 5 orang/hari).</div>
<?php endif; ?>

<form class="form-box" method="POST" action="index.php">
    <input type="hidden" name="no_daftar" value="<?php echo $editData['no_daftar'] ?? ''; ?>">

    <label>No. Daftar</label>
    <input type="text" value="<?php echo $editData ? 'D-' . str_pad($editData['no_daftar'], 4, '0', STR_PAD_LEFT) : '(Otomatis)'; ?>" readonly>

    <label>Nama Pemohon</label>
    <input type="text" name="nama_pemohon" required value="<?php echo htmlspecialchars($editData['nama_pemohon'] ?? ''); ?>">

    <label>Tanggal Daftar</label>
    <input type="date" name="tgl_daftar" required value="<?php echo $editData['tgl_daftar'] ?? date('Y-m-d'); ?>">

    <button type="submit" class="btn"><?php echo $editData ? 'Update Data' : 'Simpan'; ?></button>
    <?php if ($editData): ?>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    <?php endif; ?>
</form>

<h3 class="section-title">Data Pendaftar</h3>
<table>
    <tr>
        <th>No. Daftar</th>
        <th>Nama Pemohon</th>
        <th>Tgl Daftar</th>
        <th>Hari</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Action</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM pendaftar ORDER BY no_daftar DESC");
    if (mysqli_num_rows($res) === 0) {
        echo '<tr><td colspan="7" style="text-align:center;color:#888">Belum ada data pendaftar</td></tr>';
    }
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>D-" . str_pad($row['no_daftar'], 4, '0', STR_PAD_LEFT) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_pemohon']) . "</td>";
        echo "<td>" . date('d-m-Y', strtotime($row['tgl_daftar'])) . "</td>";
        echo "<td>" . $row['hari'] . "</td>";
        echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
        echo "<td>" . substr($row['jam'], 0, 5) . "</td>";
        echo "<td>
                <a href='index.php?edit={$row['no_daftar']}'>edit</a> |
                <a href='index.php?hapus={$row['no_daftar']}' onclick=\"return confirm('Hapus data ini?')\">hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

<?php require_once "footer.php"; ?>
