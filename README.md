# TP1DPBO2526C1

# TP1 DPBO - Sistem Manajemen Data Film

# Janji

Saya Wingko Prajna dengan NIM 2503358 mengerjakan TP 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program

Program menggunakan konsep OOP (Class dan Enkapsulasi) pada 4 bahasa pemrograman (Java, C++, Python, dan PHP) dengan array of objects berkapasitas maksimal 10 data hanya sebagai percontohan.

Atribut pada kelas `Film` terdiri dari:

1. ID Film (`id`)
2. Judul Film (`judul`)
3. Tahun Rilis (`tahun`)
4. Durasi dalam Menit (`durasiMenit`)
5. Harga Tiket (`harga`)
6. Genre (`genre`)
7. Rumah Produksi (`rumahProduksi`)

# Alur Program

Program menyediakan 6 pilihan menu utama:

* `[1]` Tambah Data (Menambah objek baru)
* `[2]` Tampilkan Data (Menampilkan semua objek)
* `[3]` Update Data (Mengubah data via ID)
* `[4]` Hapus Data (Menghapus data via ID)
* `[5]` Cari Data (Mencari objek spesifik)
* `[0]` Keluar

1. **Tambah Data Film**: User memasukkan data film baru. Sistem akan mengecek apakah kapasitas array (maksimal 10) masih mencukupi. Terdapat enkapsulasi validasi:
* **Tahun Rilis**: Jika memasukkan < 1888, nilai otomatis disesuaikan ke 1888 (tahun film pertama dibuat).
* **Durasi & Harga**: Jika memasukkan nilai $\le 0$, otomatis disesuaikan menjadi 0.


2. **Tampilkan Data**: Program melakukan perulangan (*looping*) pada array/list film untuk menampilkan seluruh data film yang tersimpan (tidak bernilai `null`/kosong).
3. **Update Data**: User memasukkan ID film target. Jika ID ditemukan, program menampilkan sub-menu untuk memilih atribut spesifik yang ingin diubah (Judul, Tahun, Durasi, Harga, Genre, atau Rumah Produksi), lalu memperbarui atribut tersebut via *setter*.
4. **Hapus Data**: User memasukkan ID film target. Jika ID ditemukan, data film dihapus dengan menggeser elemen-elemen array setelahnya ke kiri (*shift left*) agar data tetap rapat tanpa jeda kosong.
5. **Cari Data**: User memasukkan ID film target. Jika ID cocok, program akan mencetak detail film tersebut secara spesifik.
6. **Keluar**: Menghentikan perulangan menu dan menutup program.

*Catatan Khusus PHP:* Program berjalan di lingkungan web lokal menggunakan form HTML/CSS (`POST` request) dan memanfaatkan `$_SESSION` untuk mempertahankan array of objects film tanpa database.

---

# Dokumentasi

## Java

### Menu Utama
![Menu](DOKUMENTASI/D_JAVA/menu.png)
![Menu Error](DOKUMENTASI/D_JAVA/menu_error.png)
### Tambah Data
![Tambah Data](DOKUMENTASI/D_JAVA/tambah_data.png)
![Tambah Data Error](DOKUMENTASI/D_JAVA/tambah_data_error.png)
### Tampilkan Data
![Tampil Data](DOKUMENTASI/D_JAVA/tampil0_data.png)
![Tampil Data](DOKUMENTASI/D_JAVA/tampil1_data.png)
### Update Data
![Update Data](DOKUMENTASI/D_JAVA/update0_data.png)
![Update Data](DOKUMENTASI/D_JAVA/update1_data.png)
![Update Data Error](DOKUMENTASI/D_JAVA/update_data_error.png)
### Hapus Data
![Hapus Data dan Error](DOKUMENTASI/D_JAVA/hapus_data_dan_error.png)
### Cari Data
![Cari Data dan Error](DOKUMENTASI/D_JAVA/cari_data_dan_error.png)
---

## C++

### Menu Utama

### Tambah Data

### Tampilkan Data

### Update Data

### Hapus Data

### Cari Data

---

## Python

### Menu Utama

### Tambah Data

### Tampilkan Data

### Update Data

### Hapus Data

### Cari Data

---

## PHP

### Tampilan Utama & Daftar Film

### Form Tambah Data

### Form Update Data

### Form Hapus & Cari Data

### Hasil Pencarian
