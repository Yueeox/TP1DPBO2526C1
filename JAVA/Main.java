package JAVA;

import java.util.Scanner;

public class Main {
    public static void main(String[] args){
        /*Deklarasi daftar film dan membuat array untuk data dummy nya */
        Film[] daftarFilm = new Film[10];

        /*Array of daftar film */
        daftarFilm[0] = new Film(0, "Spider-Man: Across the Spider-Verse", 2023, 140, 50000, "Animation", "Sony Pictures");
        daftarFilm[1] = new Film(1, "Oppenheimer", 2023, 180, 55000, "Biography", "Universal Pictures");
        daftarFilm[2] = new Film(2, "Dune: Part Two", 2024, 166, 60000, "Sci-Fi", "Warner Bros.");
        daftarFilm[3] = new Film(3, "Parasite", 2019, 132, 40000, "Thriller", "CJ Entertainment");
        daftarFilm[4] = new Film(4, "The Dark Knight", 2008, 152, 45000, "Action", "Warner Bros.");

        /*Menu 
        Tambah Data: Menambah objek baru.
        Tampilkan Data: Menampilkan semua objek yang tersimpan.
        Update Data: Mengubah data objek berdasarkan identifier unik (seperti ID).
        Hapus Data: Menghapus objek berdasarkan identifier unik (ID).
        Cari Data: Mencari satu objek spesifik*/
        int idx = 5; /* idx 5 karena sudah ada data dari idx 0 sampai 4 */
        Scanner sc = new Scanner(System.in);
        boolean berjalan = true;

        /*Menggunakan perulangan agar tidak repot mengulang (run) program */
        while (berjalan) {
            System.out.println("==========================================");
            System.out.println("          SYSTEM MANAJEMEN DATA           ");
            System.out.println("==========================================");
            System.out.println("1. Tambah Data    (Menambah objek baru)");
            System.out.println("2. Tampilkan Data (Menampilkan semua objek)");
            System.out.println("3. Update Data    (Mengubah data via ID)");
            System.out.println("4. Hapus Data     (Menghapus data via ID)");
            System.out.println("5. Cari Data      (Mencari objek spesifik)");
            System.out.println("0. Keluar");
            System.out.println("==========================================");
            System.out.print("Pilih menu (0-5): ");

            int pilihan = sc.nextInt();
            System.out.println();
            /*case sederhana yang akan menentukan fitur apa yang akan digunakan */
            switch (pilihan) {
                case 1:
                    // 1. Cek apakah kapasitas array masih mencukupi
                    if (idx >= daftarFilm.length) {
                        System.out.println("-> Gagal! Kapasitas penyimpanan film sudah penuh (Maksimal " + daftarFilm.length + " film).");
                        break;
                    }
                    sc.nextLine(); // Membersihkan buffer setelah sc.nextInt() dari menu utama

                    System.out.print("Masukkan Judul Film         : ");
                    String judul = sc.nextLine();

                    System.out.print("Masukkan Tahun Film         : ");
                    int tahun = sc.nextInt();

                    System.out.print("Masukkan Durasi Film (Menit): ");
                    int durasiMenit = sc.nextInt();

                    System.out.print("Masukkan Harga Film (Rp)    : ");
                    int harga = sc.nextInt();
                    sc.nextLine(); // Membersihkan buffer enter setelah membaca angka harga

                    System.out.print("Masukkan Genre Film         : ");
                    String genre = sc.nextLine();

                    System.out.print("Masukkan Rumah Produksi Film: ");
                    String rumahProduksi = sc.nextLine();

                    // 2. Simpan data ke dalam array
                    daftarFilm[idx] = new Film();
                    daftarFilm[idx].setFilm(idx, judul, tahun, durasiMenit, harga, genre, rumahProduksi);

                    System.out.println("\n-> Film Sukses Ditambahkan!");
                    
                    // 3. Cetak detail film sebelum nilai idx ditambah
                    daftarFilm[idx].getFilm();

                    // 4. Increment idx setelah selesai digunakan
                    idx++;
                    break;
                case 2:
                    System.out.println("[=] Menu Tampilkan Semua Data");
                    for (int i = 0; i < idx; i++) {
                        if (daftarFilm[i] != null) {
                            daftarFilm[i].getFilm();
                        }
                    }
                    break;
                case 3:
                    System.out.println("[*] Menu Update Data Berdasarkan ID");
                    System.out.print("Masukkan ID Film yang ingin diubah: ");
                    int targetId = sc.nextInt();
                    sc.nextLine(); // Membersihkan newline/buffer scanner

                    // Cari film berdasarkan ID
                    Film filmDitemukan = null;
                    for (int i = 0; i < idx; i++) {
                        if (daftarFilm[i] != null && daftarFilm[i].getId() == targetId) {
                            filmDitemukan = daftarFilm[i];
                            break;
                        }
                    }

                    if (filmDitemukan != null) {
                        System.out.println("\nFilm ditemukan!");
                        filmDitemukan.getFilm();

                        System.out.println("\n--- Pilih Atribut yang Ingin Diubah ---");
                        System.out.println("1. Judul Film");
                        System.out.println("2. Tahun Rilis");
                        System.out.println("3. Durasi Film (Menit)");
                        System.out.println("4. Harga Tiket");
                        System.out.println("5. Genre");
                        System.out.println("6. Rumah Produksi");
                        System.out.println("0. Batal");
                        System.out.print("Pilih opsi (0-6): ");
                        int opsiUpdate = sc.nextInt();
                        sc.nextLine(); // Membersihkan newline/buffer scanner

                        switch (opsiUpdate) {
                            case 1:
                                System.out.print("Masukkan Judul Film Baru: ");
                                String judulBaru = sc.nextLine();
                                filmDitemukan.setJudul(judulBaru);
                                System.out.println("-> Judul Film berhasil diperbarui!");
                                break;
                            case 2:
                                System.out.print("Masukkan Tahun Rilis Baru: ");
                                int tahunBaru = sc.nextInt();
                                filmDitemukan.setTahun(tahunBaru);
                                System.out.println("-> Tahun Rilis berhasil diperbarui!");
                                break;
                            case 3:
                                System.out.print("Masukkan Durasi Film Baru (Menit): ");
                                int durasiBaru = sc.nextInt();
                                filmDitemukan.setDurasiMenit(durasiBaru);
                                System.out.println("-> Durasi Film berhasil diperbarui!");
                                break;
                            case 4:
                                System.out.print("Masukkan Harga Tiket Baru (Rp): ");
                                int hargaBaru = sc.nextInt();
                                filmDitemukan.setHarga(hargaBaru);
                                System.out.println("-> Harga Tiket berhasil diperbarui!");
                                break;
                            case 5:
                                System.out.print("Masukkan Genre Baru: ");
                                String genreBaru = sc.nextLine();
                                filmDitemukan.setGenre(genreBaru);
                                System.out.println("-> Genre berhasil diperbarui!");
                                break;
                            case 6:
                                System.out.print("Masukkan Rumah Produksi Baru: ");
                                String rumahProduksiBaru = sc.nextLine();
                                filmDitemukan.setRumahProduksi(rumahProduksiBaru);
                                System.out.println("-> Rumah Produksi berhasil diperbarui!");
                                break;
                            case 0:
                                System.out.println("Proses update dibatalkan.");
                                break;
                            default:
                                System.out.println("Pilihan atribut tidak valid!");
                                break;
                            }
                            filmDitemukan.getFilm();
                    } else {
                        System.out.println("Film dengan ID " + targetId + " tidak ditemukan!");
                    }
                    
                    break;
                case 4:
                    System.out.println("[-] Menu Hapus Data Berdasarkan ID");
                    // Panggil method hapusData() di sini
                    System.out.print("Masukkan ID Film yang ingin dihapus: ");
                    int targetHapusId = sc.nextInt();
                    sc.nextLine(); // Membersihkan buffer input scanner

                    int indeksHapus = -1;

                    // Cari indeks data yang akan dihapus
                    for (int i = 0; i < idx; i++) {
                        if (daftarFilm[i] != null && daftarFilm[i].getId() == targetHapusId) {
                            indeksHapus = i;
                            break;
                        }
                    }

                    // Jika data ditemukan, lakukan pergeseran elemen ke kiri (shift left)
                    if (indeksHapus != -1) {
                        String judulTerhapus = daftarFilm[indeksHapus].getJudul();

                        for (int i = indeksHapus; i < idx - 1; i++) {
                            daftarFilm[i] = daftarFilm[i + 1];
                        }

                        // Kosongkan indeks terakhir dan kurangi total counter data
                        daftarFilm[idx - 1] = null;
                        idx--;

                        System.out.println("-> Sukses! Film \"" + judulTerhapus + "\" (ID: " + targetHapusId + ") berhasil dihapus.");
                    } else {
                        System.out.println("-> Film dengan ID " + targetHapusId + " tidak ditemukan!");
                    }
                    break;
                case 5:
                    System.out.println("[?] Menu Cari Data Spesifik");
                    // Panggil method cariData() di sini
                    System.out.print("Masukkan ID Film yang dicari: ");
                    targetId = sc.nextInt();
                    sc.nextLine(); // Membersihkan newline/buffer scanner

                    // Cari film berdasarkan ID
                    filmDitemukan = null;
                    for (int i = 0; i < idx; i++) {
                        if (daftarFilm[i] != null && daftarFilm[i].getId() == targetId) {
                            filmDitemukan = daftarFilm[i];
                            break;
                        }
                    }

                    if (filmDitemukan != null) {
                        System.out.println("\nFilm ditemukan!");
                        filmDitemukan.getFilm();
                    } else {
                        System.out.println("Film dengan ID " + targetId + " tidak ditemukan!");
                    }
                    break;

                case 0:
                    System.out.println("Terima kasih, program selesai.");
                    berjalan = false;
                    break;
                default:
                    System.out.println("Pilihan tidak valid! Silakan masukkan angka 0 - 5.");
                    break;
                
            }
            System.out.println();
        }
        sc.close();



    }
}
