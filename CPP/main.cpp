#include <iostream>
#include <string>
#include <iomanip>
#include "Film.cpp"

using namespace std;

int main() {
    // Array of pointers berkapasitas 10, diinisialisasi dengan nullptr
    Film* daftarFilm[10] = {nullptr};

    // Data dummy
    daftarFilm[0] = new Film(0, "Spider-Man: Across the Spider-Verse", 2023, 140, 50000, "Animation", "Sony Pictures");
    daftarFilm[1] = new Film(1, "Oppenheimer", 2023, 180, 55000, "Biography", "Universal Pictures");
    daftarFilm[2] = new Film(2, "Dune: Part Two", 2024, 166, 60000, "Sci-Fi", "Warner Bros.");
    daftarFilm[3] = new Film(3, "Parasite", 2019, 132, 40000, "Thriller", "CJ Entertainment");
    daftarFilm[4] = new Film(4, "The Dark Knight", 2008, 152, 45000, "Action", "Warner Bros.");

    int idx = 5;
    bool berjalan = true;
    int pilihan;

    /*Menu 
    Tambah Data: Menambah objek baru.
    Tampilkan Data: Menampilkan semua objek yang tersimpan.
    Update Data: Mengubah data objek berdasarkan identifier unik (seperti ID).
    Hapus Data: Menghapus objek berdasarkan identifier unik (ID).
    Cari Data: Mencari satu objek spesifik*/

    while (berjalan) {
        cout << "==========================================\n";
        cout << "          SYSTEM MANAJEMEN DATA           \n";
        cout << "==========================================\n";
        cout << "1. Tambah Data    (Menambah objek baru)\n";
        cout << "2. Tampilkan Data (Menampilkan semua objek)\n";
        cout << "3. Update Data    (Mengubah data via ID)\n";
        cout << "4. Hapus Data     (Menghapus data via ID)\n";
        cout << "5. Cari Data      (Mencari objek spesifik)\n";
        cout << "0. Keluar\n";
        cout << "==========================================\n";
        cout << "Pilih menu (0-5): ";
        cin >> pilihan;
        cout << "\n";

        /* case untuk menentukan fitur apa yang akan digunakan*/
        switch (pilihan) {
            case 1: {
                if (idx >= 10) {
                    cout << "-> Gagal! Kapasitas penyimpanan film sudah penuh (Maksimal 10 film).\n";
                    break;
                }
                cin.ignore(); // Membersihkan buffer

                string judul, genre, rp;
                int tahun, durasi, harga;

                cout << "Masukkan Judul Film         : "; getline(cin, judul);
                cout << "Masukkan Tahun Film         : "; cin >> tahun;
                cout << "Masukkan Durasi Film (Menit): "; cin >> durasi;
                cout << "Masukkan Harga Film (Rp)    : "; cin >> harga;
                cin.ignore();
                cout << "Masukkan Genre Film         : "; getline(cin, genre);
                cout << "Masukkan Rumah Produksi Film: "; getline(cin, rp);

                daftarFilm[idx] = new Film();
                daftarFilm[idx]->setFilm(idx, judul, tahun, durasi, harga, genre, rp);

                cout << "\n-> Film Sukses Ditambahkan!\n";
                daftarFilm[idx]->getFilm();
                idx++;
                break;
            }
            case 2:
                cout << "[=] Menu Tampilkan Semua Data\n";
                for (int i = 0; i < idx; i++) {
                    if (daftarFilm[i] != nullptr) {
                        daftarFilm[i]->getFilm();
                    }
                }
                break;
            case 3: {
                cout << "[*] Menu Update Data Berdasarkan ID\n";
                cout << "Masukkan ID Film yang ingin diubah: ";
                int targetId; cin >> targetId;
                
                Film* filmDitemukan = nullptr;
                for (int i = 0; i < idx; i++) {
                    if (daftarFilm[i] != nullptr && daftarFilm[i]->getId() == targetId) {
                        filmDitemukan = daftarFilm[i];
                        break;
                    }
                }

                if (filmDitemukan != nullptr) {
                    cout << "\nFilm ditemukan!\n";
                    filmDitemukan->getFilm();

                    cout << "\n--- Pilih Atribut yang Ingin Diubah ---\n";
                    cout << "1. Judul Film\n2. Tahun Rilis\n3. Durasi Film (Menit)\n";
                    cout << "4. Harga Tiket\n5. Genre\n6. Rumah Produksi\n0. Batal\n";
                    cout << "Pilih opsi (0-6): ";
                    int opsiUpdate; cin >> opsiUpdate;
                    cin.ignore();

                    string strBaru; int intBaru;
                    switch (opsiUpdate) {
                        case 1:
                            cout << "Masukkan Judul Baru: "; getline(cin, strBaru);
                            filmDitemukan->setJudul(strBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 2:
                            cout << "Masukkan Tahun Baru: "; cin >> intBaru;
                            filmDitemukan->setTahun(intBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 3:
                            cout << "Masukkan Durasi Baru: "; cin >> intBaru;
                            filmDitemukan->setDurasiMenit(intBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 4:
                            cout << "Masukkan Harga Baru: "; cin >> intBaru;
                            filmDitemukan->setHarga(intBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 5:
                            cout << "Masukkan Genre Baru: "; getline(cin, strBaru);
                            filmDitemukan->setGenre(strBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 6:
                            cout << "Masukkan Rumah Produksi Baru: "; getline(cin, strBaru);
                            filmDitemukan->setRumahProduksi(strBaru);
                            cout << "-> Berhasil diperbarui!\n"; break;
                        case 0: cout << "Dibatalkan.\n"; break;
                        default: cout << "Opsi tidak valid!\n"; break;
                    }
                    if (opsiUpdate >= 1 && opsiUpdate <= 6) filmDitemukan->getFilm();
                } else {
                    cout << "Film dengan ID " << targetId << " tidak ditemukan!\n";
                }
                break;
            }
            case 4: {
                cout << "[-] Menu Hapus Data Berdasarkan ID\n";
                cout << "Masukkan ID Film yang ingin dihapus: ";
                int targetId; cin >> targetId;
                
                int indeksHapus = -1;
                for (int i = 0; i < idx; i++) {
                    if (daftarFilm[i] != nullptr && daftarFilm[i]->getId() == targetId) {
                        indeksHapus = i;
                        break;
                    }
                }

                if (indeksHapus != -1) {
                    string judulTerhapus = daftarFilm[indeksHapus]->getJudul();
                    delete daftarFilm[indeksHapus]; // Bebaskan memori

                    for (int i = indeksHapus; i < idx - 1; i++) {
                        daftarFilm[i] = daftarFilm[i + 1];
                    }
                    daftarFilm[idx - 1] = nullptr;
                    idx--;
                    cout << "-> Sukses! Film \"" << judulTerhapus << "\" dihapus.\n";
                } else {
                    cout << "-> Film tidak ditemukan!\n";
                }
                break;
            }
            case 5: {
                cout << "[?] Menu Cari Data Spesifik\n";
                cout << "Masukkan ID Film yang dicari: ";
                int targetId; cin >> targetId;
                
                bool ditemukan = false;
                for (int i = 0; i < idx; i++) {
                    if (daftarFilm[i] != nullptr && daftarFilm[i]->getId() == targetId) {
                        cout << "\nFilm ditemukan!\n";
                        daftarFilm[i]->getFilm();
                        ditemukan = true;
                        break;
                    }
                }
                if (!ditemukan) cout << "Film tidak ditemukan!\n";
                break;
            }
            case 0:
                cout << "Terima kasih, program selesai.\n";
                berjalan = false;
                break;
            default:
                cout << "Pilihan tidak valid!\n";
                break;
        }
        cout << "\n";
    }

    // Membersihkan sisa memori sebelum keluar
    for (int i = 0; i < idx; i++) {
        if (daftarFilm[i] != nullptr) {
            delete daftarFilm[i];
        }
    }
    return 0;
}