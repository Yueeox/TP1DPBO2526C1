from film import Film

def main():
    # Array/List statis berkapasitas 10
    daftar_film = [None] * 10
    
    # Data Dummy
    daftar_film[0] = Film(0, "Spider-Man: Across the Spider-Verse", 2023, 140, 50000, "Animation", "Sony Pictures")
    daftar_film[1] = Film(1, "Oppenheimer", 2023, 180, 55000, "Biography", "Universal Pictures")
    daftar_film[2] = Film(2, "Dune: Part Two", 2024, 166, 60000, "Sci-Fi", "Warner Bros.")
    daftar_film[3] = Film(3, "Parasite", 2019, 132, 40000, "Thriller", "CJ Entertainment")
    daftar_film[4] = Film(4, "The Dark Knight", 2008, 152, 45000, "Action", "Warner Bros.")

    # Menu
    # Tambah Data: Menambah objek baru.
    # Tampilkan Data: Menampilkan semua objek yang tersimpan.
    # Update Data: Mengubah data objek berdasarkan identifier unik (seperti ID).
    # Hapus Data: Menghapus objek berdasarkan identifier unik (ID).
    # Cari Data: Mencari satu objek spesifik
    idx = 5
    berjalan = True

    # Menggunakan perulangan agar tidak repot mengulang (run) program 
    while berjalan:
        print("==========================================")
        print("          SYSTEM MANAJEMEN DATA           ")
        print("==========================================")
        print("1. Tambah Data    (Menambah objek baru)")
        print("2. Tampilkan Data (Menampilkan semua objek)")
        print("3. Update Data    (Mengubah data via ID)")
        print("4. Hapus Data     (Menghapus data via ID)")
        print("5. Cari Data      (Mencari objek spesifik)")
        print("0. Keluar")
        print("==========================================")

        # Guard agar yang di input user merupakan angka
        try:
            pilihan = int(input("Pilih menu (0-5): "))
        except ValueError:
            print("Pilihan harus berupa angka! (0-5)")
            continue
        print()

        # logika sederhana untuk menentukan fitur apa yang akan di jalankan program
        # Berdasarkan keinginan user
        if pilihan == 1:
            if idx >= len(daftar_film):
                print(f"-> Gagal! Kapasitas penyimpanan film penuh (Maksimal {len(daftar_film)} film).")
                continue
            
            judul = input("Masukkan Judul Film         : ")
            tahun = int(input("Masukkan Tahun Film         : "))
            durasi = int(input("Masukkan Durasi Film (Menit): "))
            harga = int(input("Masukkan Harga Film (Rp)    : "))
            genre = input("Masukkan Genre Film         : ")
            rp = input("Masukkan Rumah Produksi Film: ")

            daftar_film[idx] = Film()
            daftar_film[idx].set_film(idx, judul, tahun, durasi, harga, genre, rp)
            
            print("\n-> Film Sukses Ditambahkan!")
            daftar_film[idx].get_film()
            idx += 1

        elif pilihan == 2:
            print("[=] Menu Tampilkan Semua Data")
            for i in range(idx):
                if daftar_film[i] is not None:
                    daftar_film[i].get_film()

        elif pilihan == 3:
            print("[*] Menu Update Data Berdasarkan ID")
            target_id = int(input("Masukkan ID Film yang ingin diubah: "))
            
            film_ditemukan = None
            for i in range(idx):
                if daftar_film[i] is not None and daftar_film[i].get_id() == target_id:
                    film_ditemukan = daftar_film[i]
                    break
            
            if film_ditemukan:
                print("\nFilm ditemukan!")
                film_ditemukan.get_film()
                print("\n--- Pilih Atribut yang Ingin Diubah ---")
                print("1. Judul Film\n2. Tahun Rilis\n3. Durasi Film (Menit)")
                print("4. Harga Tiket\n5. Genre\n6. Rumah Produksi\n0. Batal")
                
                opsi = int(input("Pilih opsi (0-6): "))
                if opsi == 1:
                    film_ditemukan.set_judul(input("Masukkan Judul Baru: "))
                elif opsi == 2:
                    film_ditemukan.set_tahun(int(input("Masukkan Tahun Baru: ")))
                elif opsi == 3:
                    film_ditemukan.set_durasi_menit(int(input("Masukkan Durasi Baru: ")))
                elif opsi == 4:
                    film_ditemukan.set_harga(int(input("Masukkan Harga Baru: ")))
                elif opsi == 5:
                    film_ditemukan.set_genre(input("Masukkan Genre Baru: "))
                elif opsi == 6:
                    film_ditemukan.set_rumah_produksi(input("Masukkan Rumah Produksi Baru: "))
                elif opsi == 0:
                    print("Dibatalkan.")
                else:
                    print("Opsi tidak valid!")

                if 1 <= opsi <= 6:
                    print("-> Data berhasil diperbarui!")
                    film_ditemukan.get_film()
            else:
                print(f"Film dengan ID {target_id} tidak ditemukan!")

        elif pilihan == 4:
            print("[-] Menu Hapus Data Berdasarkan ID")
            target_id = int(input("Masukkan ID Film yang ingin dihapus: "))
            
            indeks_hapus = -1
            for i in range(idx):
                if daftar_film[i] is not None and daftar_film[i].get_id() == target_id:
                    indeks_hapus = i
                    break

            if indeks_hapus != -1:
                judul_terhapus = daftar_film[indeks_hapus].get_judul()
                
                # Menggeser array ke kiri
                for i in range(indeks_hapus, idx - 1):
                    daftar_film[i] = daftar_film[i + 1]
                
                daftar_film[idx - 1] = None
                idx -= 1
                print(f"-> Sukses! Film \"{judul_terhapus}\" (ID: {target_id}) berhasil dihapus.")
            else:
                print(f"-> Film dengan ID {target_id} tidak ditemukan!")

        elif pilihan == 5:
            print("[?] Menu Cari Data Spesifik")
            target_id = int(input("Masukkan ID Film yang dicari: "))
            
            ditemukan = False
            for i in range(idx):
                if daftar_film[i] is not None and daftar_film[i].get_id() == target_id:
                    print("\nFilm ditemukan!")
                    daftar_film[i].get_film()
                    ditemukan = True
                    break
            if not ditemukan:
                print(f"Film dengan ID {target_id} tidak ditemukan!")

        elif pilihan == 0:
            print("Terima kasih, program selesai.")
            berjalan = False
        else:
            print("Pilihan tidak valid! Silakan masukkan angka 0 - 5.")
        print()

if __name__ == "__main__":
    main()