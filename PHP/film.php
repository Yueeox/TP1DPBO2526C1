<?php
class Film {
    private $id;
    private $judul;
    private $tahun;
    private $durasiMenit;
    private $harga;
    private $genre;
    private $rumahProduksi;

    public function __construct($id = 0, $judul = "", $tahun = 0, $durasiMenit = 0, $harga = 0, $genre = "", $rumahProduksi = "") {
        $this->id = $id;
        $this->judul = $judul;
        $this->setTahun($tahun);
        $this->setDurasiMenit($durasiMenit);
        $this->setHarga($harga);
        $this->genre = $genre;
        $this->rumahProduksi = $rumahProduksi;
    }

    public function getFilm() {
        $hargaFormat = number_format($this->harga, 0, ',', '.');
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

    public function setFilm($id, $judul, $tahun, $durasiMenit, $harga, $genre, $rumahProduksi) {
        $this->id = $id;
        $this->judul = $judul;
        $this->setTahun($tahun);
        $this->setDurasiMenit($durasiMenit);
        $this->setHarga($harga);
        $this->genre = $genre;
        $this->rumahProduksi = $rumahProduksi;
    }

    // Getter & Setter Individu
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getJudul() { return $this->judul; }
    public function setJudul($judul) { $this->judul = $judul; }

    public function getTahun() { return $this->tahun; }
    public function setTahun($tahun) {
        if ($tahun >= 1888) {
            $this->tahun = $tahun;
        } else {
            $this->tahun = 1888;
        }
    }

    public function getDurasiMenit() { return $this->durasiMenit; }
    public function setDurasiMenit($durasi) {
        $this->durasiMenit = ($durasi > 0) ? $durasi : 0;
    }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) {
        $this->harga = ($harga > 0) ? $harga : 0;
    }

    public function getGenre() { return $this->genre; }
    public function setGenre($genre) { $this->genre = $genre; }

    public function getRumahProduksi() { return $this->rumahProduksi; }
    public function setRumahProduksi($rp) { $this->rumahProduksi = $rp; }
}
?>