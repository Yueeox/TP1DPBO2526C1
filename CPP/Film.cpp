using namespace std;

class Film {
private:
    int id;
    string judul;
    int tahun;
    int durasiMenit;
    int harga;
    string genre;
    string rumahProduksi;

public:
    /* Constructor */
    Film(){};
    /* Destrucktor */
    ~Film(){};
    /* Membuat Objek yang didalamnya memiliki beberapa error handling agar data yang nantinya di simpan
    tidak melenceng dari akal
    karena tidak mungkin ada film berdurasi minus, harga minus, bahkan lebih tua dari tahun 1888 */
    Film(int id, string judul, int tahun, int durasiMenit, int harga, string genre, string rumahProduksi) {
        this->id = id;
        this->judul = judul;
        if (tahun >= 1888) {
            this->tahun = tahun;
        } else {
            cout << "Film pertama di dunia dibuat pada tahun 1888 dengan judul Roundhay Garden\n";
            cout << "Masukan Tahun diubah menjadi 1888!\n";
            this->tahun = 1888;
        }
        if (durasiMenit > 0) {
            this->durasiMenit = durasiMenit;
        } else {
            this->durasiMenit = 0;
        }
        if (harga > 0) {
            this->harga = harga;
        } else {
            this->harga = 0;
        }
        this->genre = genre;
        this->rumahProduksi = rumahProduksi;
    }

    /* Method - Print Detail */
    /*Menampilkan data menggunakan getter */
    void getFilm() {
        cout << "=============================================\n";
        cout << "               DETAIL FILM                   \n";
        cout << "=============================================\n";
        cout << left << setw(18) << "ID Film" << " : " << this->id << "\n";
        cout << left << setw(18) << "Judul Film" << " : " << this->judul << "\n";
        cout << left << setw(18) << "Tahun Rilis" << " : " << this->tahun << "\n";
        cout << left << setw(18) << "Durasi" << " : " << this->durasiMenit << " Menit\n";
        // Format harga sederhana di C++
        cout << left << setw(18) << "Harga Tiket" << " : Rp " << this->harga << "\n";
        cout << left << setw(18) << "Genre" << " : " << this->genre << "\n";
        cout << left << setw(18) << "Rumah Produksi" << " : " << this->rumahProduksi << "\n";
    }

    /* Method - Setter Gabungan */
    void setFilm(int id, string judul, int tahun, int durasiMenit, int harga, string genre, string rumahProduksi) {
        this->id = id;
        this->judul = judul;
        setTahun(tahun);
        setDurasiMenit(durasiMenit);
        setHarga(harga);
        this->genre = genre;
        this->rumahProduksi = rumahProduksi;
    }

    /* Getter & Setter Individu */
    int getId() { return id; }
    void setId(int id) { this->id = id; }

    string getJudul() { return judul; }
    void setJudul(string judul) { this->judul = judul; }

    int getTahun() { return tahun; }
    void setTahun(int tahun) {
        if (tahun >= 1888) {
            this->tahun = tahun;
        } else {
            cout << "Film pertama di dunia dibuat pada tahun 1888 dengan judul Roundhay Garden\n";
            cout << "Masukan Tahun diubah menjadi 1888!\n";
            this->tahun = 1888;
        }
    }

    int getDurasiMenit() { return durasiMenit; }
    void setDurasiMenit(int durasiMenit) {
        if (durasiMenit > 0) {
            this->durasiMenit = durasiMenit;
        } else {
            this->durasiMenit = 0;
        }
    }

    int getHarga() { return harga; }
    void setHarga(int harga) {
        if (harga > 0) {
            this->harga = harga;
        } else {
            this->harga = 0;
        }
    }

    string getGenre() { return genre; }
    void setGenre(string genre) { this->genre = genre; }

    string getRumahProduksi() { return rumahProduksi; }
    void setRumahProduksi(string rumahProduksi) { this->rumahProduksi = rumahProduksi; }
};