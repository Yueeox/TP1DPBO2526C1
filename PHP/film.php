<?php
// Class Film untuk merepresentasikan data sebuah film
class Film {
    // Atribut/properti film (private = hanya bisa diakses dari dalam class)
    private $id;
    private $judul;
    private $tahun;
    private $durasiMenit;
    private $harga;
    private $genre;
    private $rumahProduksi;

    // Constructor: dijalankan otomatis saat object dibuat
    public function __construct($id = 0, $judul = "", $tahun = 0, $durasiMenit = 0, $harga = 0, $genre = "", $rumahProduksi = "") {
        $this->id = $id;
        $this->judul = $judul;
        $this->setTahun($tahun);          // pakai setter agar validasi jalan
        $this->setDurasiMenit($durasiMenit);
        $this->setHarga($harga);
        $this->genre = $genre;
        $this->rumahProduksi = $rumahProduksi;
    }

    // Method untuk menampilkan detail film dalam bentuk HTML
    public function getFilm() {
        // Format harga jadi format Rupiah (contoh: 50000 -> 50.000)
        $hargaFormat = number_format($this->harga, 0, ',', '.');

        // Mengembalikan string HTML berisi tabel detail film
        return "
        <div style='border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 8px; background-color: #fdfdfd;'>
            <h4 style='margin-top:0; color:#333;'>DETAIL FILM</h4>
            <table style='width:100%; border-collapse:collapse;'>
                <tr><td width='180'><strong>ID Film</strong></td><td>: {$this->id}</td></tr>
                <tr><td><strong>Judul Film</strong></td><td>: {$this->judul}</td></tr>
                <tr><td><strong>Tahun Rilis</strong></td><td>: {$this->tahun}</td></tr>
                <tr><td><strong>Durasi</strong></td><td>: {$this->durasiMenit} Menit</td></tr>
                <tr><td><strong>Harga Tiket</strong></td><td>: Rp {$hargaFormat}</td></tr>
                <tr><td><strong>Genre</strong></td><td>: {$this->genre}</td></tr>
                <tr><td><strong>Rumah Produksi</strong></td><td>: {$this->rumahProduksi}</td></tr>
            </table>
        </div>";
    }

    // Method untuk mengubah seluruh data film sekaligus
    public function setFilm($id, $judul, $tahun, $durasiMenit, $harga, $genre, $rumahProduksi) {
        $this->id = $id;
        $this->judul = $judul;
        $this->setTahun($tahun);
        $this->setDurasiMenit($durasiMenit);
        $this->setHarga($harga);
        $this->genre = $genre;
        $this->rumahProduksi = $rumahProduksi;
    }

    // ===== Getter & Setter Individu =====
    // Getter = ambil nilai, Setter = ubah nilai

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getJudul() { return $this->judul; }
    public function setJudul($judul) { $this->judul = $judul; }

    public function getTahun() { return $this->tahun; }
    public function setTahun($tahun) {
        // Validasi: tahun film minimal 1888 (tahun film pertama dibuat)
        if ($tahun >= 1888) {
            $this->tahun = $tahun;
        } else {
            $this->tahun = 1888;
        }
    }

    public function getDurasiMenit() { return $this->durasiMenit; }
    public function setDurasiMenit($durasi) {
        // Validasi: durasi harus lebih dari 0, kalau tidak set ke 0
        $this->durasiMenit = ($durasi > 0) ? $durasi : 0;
    }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) {
        // Validasi: harga harus lebih dari 0, kalau tidak set ke 0
        $this->harga = ($harga > 0) ? $harga : 0;
    }

    public function getGenre() { return $this->genre; }
    public function setGenre($genre) { $this->genre = $genre; }

    public function getRumahProduksi() { return $this->rumahProduksi; }
    public function setRumahProduksi($rp) { $this->rumahProduksi = $rp; }
}
?>