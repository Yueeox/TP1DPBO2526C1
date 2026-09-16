<?php
require_once 'Film.php';   // memanggil class Film
session_start();           // memulai session untuk menyimpan data

// Inisialisasi data dummy di session jika belum ada
if (!isset($_SESSION['daftarFilm'])) {
    $_SESSION['daftarFilm'] = [
        new Film(0, "Spider-Man: Across the Spider-Verse", 2023, 140, 50000, "Animation", "Sony Pictures"),
        new Film(1, "Oppenheimer", 2023, 180, 55000, "Biography", "Universal Pictures"),
        new Film(2, "Dune: Part Two", 2024, 166, 60000, "Sci-Fi", "Warner Bros."),
        new Film(3, "Parasite", 2019, 132, 40000, "Thriller", "CJ Entertainment"),
        new Film(4, "The Dark Knight", 2008, 152, 45000, "Action", "Warner Bros.")
    ];
}

$pesan = "";           // pesan notifikasi ke user
$hasilCari = null;     // menampung film hasil pencarian

// ===== Handling Form Submission =====
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'] ?? '';  // ambil aksi yang dipilih

    // --- Aksi Tambah Data ---
    if ($aksi === 'tambah') {
        // Cek kapasitas maksimal 10 film
        if (count($_SESSION['daftarFilm']) >= 10) {
            $pesan = "Gagal! Kapasitas penyimpanan film sudah penuh (Maksimal 10 film).";
        } else {
            $idBaru = count($_SESSION['daftarFilm']);  // ID otomatis berdasarkan jumlah data
            $filmBaru = new Film();
            $filmBaru->setFilm(
                $idBaru,
                $_POST['judul'],
                (int)$_POST['tahun'],
                (int)$_POST['durasi'],
                (int)$_POST['harga'],
                $_POST['genre'],
                $_POST['rumahProduksi']
            );
            $_SESSION['daftarFilm'][] = $filmBaru;   // simpan ke session
            $pesan = "Film \"{$_POST['judul']}\" berhasil ditambahkan!";
        }
    } 
    // --- Aksi Update Data ---
    elseif ($aksi === 'update') {
        $targetId = (int)$_POST['targetId'];
        $opsi = $_POST['opsiUpdate'];      // atribut yang mau diubah
        $nilai = $_POST['nilaiBaru'];      // nilai baru
        $ditemukan = false;

        // Cari film berdasarkan ID, lalu ubah atribut yang dipilih
        foreach ($_SESSION['daftarFilm'] as $film) {
            if ($film->getId() === $targetId) {
                $ditemukan = true;
                switch ($opsi) {
                    case 'judul': $film->setJudul($nilai); break;
                    case 'tahun': $film->setTahun((int)$nilai); break;
                    case 'durasi': $film->setDurasiMenit((int)$nilai); break;
                    case 'harga': $film->setHarga((int)$nilai); break;
                    case 'genre': $film->setGenre($nilai); break;
                    case 'rumahProduksi': $film->setRumahProduksi($nilai); break;
                }
                $pesan = "Data film ID {$targetId} berhasil diperbarui!";
                break;
            }
        }
        if (!$ditemukan) $pesan = "Film dengan ID {$targetId} tidak ditemukan!";
    } 
    // --- Aksi Hapus Data ---
    elseif ($aksi === 'hapus') {
        $targetId = (int)$_POST['targetId'];
        $indeksHapus = -1;

        // Cari indeks film berdasarkan ID
        foreach ($_SESSION['daftarFilm'] as $index => $film) {
            if ($film->getId() === $targetId) {
                $indeksHapus = $index;
                break;
            }
        }

        if ($indeksHapus !== -1) {
            $judulTerhapus = $_SESSION['daftarFilm'][$indeksHapus]->getJudul();
            array_splice($_SESSION['daftarFilm'], $indeksHapus, 1);  // hapus dari array
            $pesan = "Film \"{$judulTerhapus}\" (ID: {$targetId}) berhasil dihapus!";
        } else {
            $pesan = "Film dengan ID {$targetId} tidak ditemukan!";
        }
    } 
    // --- Aksi Cari Data ---
    elseif ($aksi === 'cari') {
        $targetId = (int)$_POST['targetId'];
        foreach ($_SESSION['daftarFilm'] as $film) {
            if ($film->getId() === $targetId) {
                $hasilCari = $film;   // simpan hasil untuk ditampilkan
                break;
            }
        }
        if (!$hasilCari) $pesan = "Film dengan ID {$targetId} tidak ditemukan!";
    }
    // --- Aksi Reset ke Data Awal ---
    elseif ($aksi === 'reset') {
        unset($_SESSION['daftarFilm']);      // hapus semua data
        header("Location: index.php");       // refresh halaman
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Data Film</title>
    <style>
        /* Styling tampilan halaman */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f6f9; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .card { border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 6px; }
        .form-group { margin-bottom: 10px; }
        label { display: inline-block; width: 180px; font-weight: bold; }
        input[type="text"], input[type="number"], select { padding: 6px; width: 250px; }
        button { padding: 8px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .alert { padding: 10px; background-color: #e7f3fe; color: #31708f; border-left: 6px solid #2196F3; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Sistem Manajemen Data Film</h2>

    <!-- Tampilkan pesan notifikasi jika ada -->
    <?php if ($pesan): ?>
        <div class="alert"><?= $pesan ?></div>
    <?php endif; ?>

    <!-- ===== Form Tambah Data ===== -->
    <div class="card">
        <h3>1. Tambah Data Film Baru</h3>
        <form method="POST">
            <input type="hidden" name="aksi" value="tambah">
            <div class="form-group"><label>Judul Film:</label><input type="text" name="judul" required></div>
            <div class="form-group"><label>Tahun Film:</label><input type="number" name="tahun" required></div>
            <div class="form-group"><label>Durasi (Menit):</label><input type="number" name="durasi" required></div>
            <div class="form-group"><label>Harga Tiket (Rp):</label><input type="number" name="harga" required></div>
            <div class="form-group"><label>Genre:</label><input type="text" name="genre" required></div>
            <div class="form-group"><label>Rumah Produksi:</label><input type="text" name="rumahProduksi" required></div>
            <button type="submit">Tambah Film</button>
        </form>
    </div>

    <!-- ===== Form Update Data ===== -->
    <div class="card">
        <h3>3. Update Data Film via ID</h3>
        <form method="POST">
            <input type="hidden" name="aksi" value="update">
            <div class="form-group"><label>ID Film Target:</label><input type="number" name="targetId" required></div>
            <div class="form-group">
                <label>Atribut Diubah:</label>
                <select name="opsiUpdate">
                    <option value="judul">Judul Film</option>
                    <option value="tahun">Tahun Rilis</option>
                    <option value="durasi">Durasi (Menit)</option>
                    <option value="harga">Harga Tiket</option>
                    <option value="genre">Genre</option>
                    <option value="rumahProduksi">Rumah Produksi</option>
                </select>
            </div>
            <div class="form-group"><label>Nilai Baru:</label><input type="text" name="nilaiBaru" required></div>
            <button type="submit">Update Film</button>
        </form>
    </div>

    <!-- ===== Form Hapus & Cari (berdampingan) ===== -->
    <div style="display: flex; gap: 20px;">
        <!-- Form Hapus -->
        <div class="card" style="flex: 1;">
            <h3>4. Hapus Data Film</h3>
            <form method="POST">
                <input type="hidden" name="aksi" value="hapus">
                <div class="form-group"><label style="width: 100px;">ID Film:</label><input type="number" name="targetId" style="width: 120px;" required></div>
                <button type="submit" style="background-color: #dc3545;">Hapus Film</button>
            </form>
        </div>

        <!-- Form Cari -->
        <div class="card" style="flex: 1;">
            <h3>5. Cari Data Film</h3>
            <form method="POST">
                <input type="hidden" name="aksi" value="cari">
                <div class="form-group"><label style="width: 100px;">ID Film:</label><input type="number" name="targetId" style="width: 120px;" required></div>
                <button type="submit" style="background-color: #28a745;">Cari Film</button>
            </form>
        </div>
    </div>

    <!-- ===== Hasil Pencarian (hanya muncul jika ada) ===== -->
    <?php if ($hasilCari): ?>
        <h3>Hasil Pencarian:</h3>
        <?= $hasilCari->getFilm() ?>
    <?php endif; ?>

    <hr>

    <!-- ===== Tampilkan Semua Data Film ===== -->
    <h3>2. Daftar Semua Film Simpanan (Total: <?= count($_SESSION['daftarFilm']) ?>/10)</h3>
    <?php 
    if (empty($_SESSION['daftarFilm'])) {
        echo "<p>Tidak ada data film.</p>";   // jika data kosong
    } else {
        foreach ($_SESSION['daftarFilm'] as $film) {
            echo $film->getFilm();            // tampilkan setiap film
        }
    }
    ?>

    <!-- ===== Tombol Reset ke Data Dummy ===== -->
    <form method="POST" style="margin-top: 20px;">
        <input type="hidden" name="aksi" value="reset">
        <button type="submit" style="background-color: #6c757d;">Reset ke Data Dummy Awal</button>
    </form>
</div>

</body>
</html>