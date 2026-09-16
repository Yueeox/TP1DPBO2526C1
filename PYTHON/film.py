class Film:
    def __init__(self, id_film=0, judul="", tahun=0, durasi=0, harga=0, genre="", rumah_produksi=""):
        self.__id = id_film
        self.__judul = judul
        self.__tahun = tahun
        self.__durasiMenit = durasi
        self.__harga = harga
        self.__genre = genre
        self.__rumahProduksi = rumah_produksi

    # Method - Print Detail
    def get_film(self):
        print("=============================================")
        print("               DETAIL FILM                   ")
        print("=============================================")
        print(f"{'ID Film':<18} : {self.__id}")
        print(f"{'Judul Film':<18} : {self.__judul}")
        print(f"{'Tahun Rilis':<18} : {self.__tahun}")
        print(f"{'Durasi':<18} : {self.__durasiMenit} Menit")
        print(f"{'Harga Tiket':<18} : Rp {self.__harga:,}")
        print(f"{'Genre':<18} : {self.__genre}")
        print(f"{'Rumah Produksi':<18} : {self.__rumahProduksi}")

    # Method - Setter Gabungan
    def set_film(self, id_film, judul, tahun, durasi, harga, genre, rumah_produksi):
        self.__id = id_film
        self.__judul = judul
        self.set_tahun(tahun)
        self.set_durasi_menit(durasi)
        self.set_harga(harga)
        self.__genre = genre
        self.__rumahProduksi = rumah_produksi

    # Getter & Setter Individu
    def get_id(self): return self.__id
    def set_id(self, id_film): self.__id = id_film

    def get_judul(self): return self.__judul
    def set_judul(self, judul): self.__judul = judul

    def get_tahun(self): return self.__tahun
    def set_tahun(self, tahun):
        if tahun >= 1888:
            self.__tahun = tahun
        else:
            print("Film pertama di dunia dibuat pada tahun 1888 dengan judul Roundhay Garden")
            print("Masukan Tahun diubah menjadi 1888!")
            self.__tahun = 1888

    def get_durasi_menit(self): return self.__durasiMenit
    def set_durasi_menit(self, durasi):
        self.__durasiMenit = durasi if durasi > 0 else 0

    def get_harga(self): return self.__harga
    def set_harga(self, harga):
        self.__harga = harga if harga > 0 else 0

    def get_genre(self): return self.__genre
    def set_genre(self, genre): self.__genre = genre

    def get_rumah_produksi(self): return self.__rumahProduksi
    def set_rumah_produksi(self, rp): self.__rumahProduksi = rp