# Program Pengajuan Paspor (PHP Native + MySQL)
UAS Pemrograman Web II — Kantor Imigrasi Cabang

## Isi File
- `database.sql` → struktur tabel + data dummy (import ini duluan)
- `config.php` → koneksi database
- `functions.php` → logika perhitungan jadwal, no antrian, nama hari
- `header.php` / `footer.php` → template navigasi & layout
- `style.css` → tampilan
- `index.php` → **Input Daftar**
- `daftar_ulang.php` → **Input Daftar Ulang**
- `pengurusan.php` → **Pengurusan Berkas**

## Cara Menjalankan (XAMPP / Laragon)
1. Copy folder `pengajuan_paspor` ke folder `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache & MySQL.
3. Buka `phpMyAdmin` → tab **Import** → pilih file `database.sql` → klik **Go**.
   (Ini akan otomatis membuat database `db_paspor` beserta 3 tabel dan data dummy.)
4. Jika username/password MySQL Anda berbeda dari default (`root` tanpa password),
   sesuaikan di file `config.php`.
5. Buka browser: `http://localhost/pengajuan_paspor/index.php`

## Alur & Logika Program

### 1. Input Daftar (`index.php`)
- User mengisi **Nama Pemohon** dan **Tanggal Daftar**.
- Sistem otomatis menentukan **Hari**, **Tanggal**, dan **Jam** kedatangan wajib:
  - Kapasitas per hari = **5 orang** (slot jam: 09:00, 10:00, 11:00, 13:00, 14:00).
  - Jika tanggal yang dipilih sudah terisi 5 orang, sistem otomatis menggeser
    ke hari berikutnya (looping sampai menemukan slot kosong).
- Tersedia fitur **edit** dan **hapus**.

### 2. Input Daftar Ulang (`daftar_ulang.php`)
- User memilih **No. Daftar** (data nama pemohon & jadwal wajib datang otomatis terisi).
- User mengisi **Keperluan**, kelengkapan berkas (**KTP, KK, Ijazah/Akte** = Ada/Tidak),
  serta **Hari & Tanggal Datang** (aktual).
- **Keterangan** otomatis:
  - **OK** → jika Tanggal Datang **sesuai** dengan jadwal wajib datang dari menu Daftar.
  - **Tidak** → jika tidak sesuai.
- Jika Keterangan = **OK**, sistem otomatis membuatkan **No. Antrian** (format `ANT-YYYYMMDD-XXX`).

### 3. Pengurusan Berkas (`pengurusan.php`)
- User memilih **No. Antrian** yang sudah lolos tahap Daftar Ulang (Keterangan = OK).
- Sistem mengecek ulang kelengkapan berkas (KTP, KK, Ijazah/Akte):
  - Jika **semua Ada** → Berkas = **Lengkap**, Status = **Diterima**, Keterangan = **OK**,
    Pembayaran = **Rp355.000**.
  - Jika **ada yang Tidak** → Berkas = **Tidak Lengkap**, Status = **Ditolak**,
    Pembayaran = **Rp0**.
- Total **Pendapatan** dihitung otomatis dari jumlah seluruh pembayaran berstatus **Diterima**.

## Data Dummy
- 7 pendaftar, termasuk contoh kapasitas penuh (5 orang di tanggal 2026-07-01,
  orang ke-6 otomatis pindah ke 2026-07-02).
- 3 data daftar ulang: 1 Keterangan "Tidak" (datang tidak sesuai jadwal),
  2 Keterangan "OK" (mendapat No. Antrian).
- 2 data pengurusan: 1 Diterima (bayar 355rb), 1 Ditolak (berkas tidak lengkap).

## Catatan
Program ini dibuat dengan PHP native (mysqli) + MySQL sesuai instruksi soal
("menggunakan Database, PHP dan MySQL saja biar lebih mudah"), tanpa framework,
agar mudah dipahami dan dipresentasikan saat ujian.
