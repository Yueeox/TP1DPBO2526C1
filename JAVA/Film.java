package JAVA;

public class Film {
    private int id;
    private String judul;
    private int tahun;
    private int durasiMenit;
    private int harga;
    private String genre;
    private String rumahProduksi;

    /*Constructor */
    public Film(){}

    public Film(int id, String judul, int tahun, int durasiMenit, int harga, String genre, String rumahProduksi){
        this.id = id;
        this.judul = judul;
        this.tahun = tahun;
        this.durasiMenit = durasiMenit;
        this.harga = harga;
        this.genre = genre;
        this.rumahProduksi = rumahProduksi;
    }

    /*Method - Getter */
    public void getFilm(){
        System.out.println("=============================================");
        System.out.println("               DETAIL FILM                   ");
        System.out.println("=============================================");
        System.out.printf("%-18s : %s\n", "ID Film", this.id);
        System.out.printf("%-18s : %s\n", "Judul Film", this.judul);
        System.out.printf("%-18s : %d\n", "Tahun Rilis", this.tahun);
        System.out.printf("%-18s : %d Menit\n", "Durasi", this.durasiMenit);
        System.out.printf("%-18s : Rp %,d\n", "Harga Tiket", this.harga);
        System.out.printf("%-18s : %s\n", "Genre", this.genre);
        System.out.printf("%-18s : %s\n", "Rumah Produksi", this.rumahProduksi);
    }
    /*Method - Setter */

    public void setFilm(int id, String judul, int tahun, int durasiMenit, int harga, String genre, String rumahProduksi){
        this.id = id;
        this.judul = judul;
        this.tahun = tahun;
        this.durasiMenit = durasiMenit;
        this.harga = harga;
        this.genre = genre;
        this.rumahProduksi = rumahProduksi;
    }

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getJudul() { return judul; }
    public void setJudul(String judul) { this.judul = judul; }

    public int getTahun() { return tahun; }
    public void setTahun(int tahun){
        if (tahun >= 1888){
            this.tahun = tahun; 
        } else {
            System.out.println("Film pertama di dunia dibuat pada tahun 1888 dengan judul Roundhay Garden");
            System.out.println("Masukan Tahun diubah menjadi 1888!");
            this.tahun = 1888;
        }
    }

    public int getDurasiMenit() { return durasiMenit; }
    public void setDurasiMenit(int durasiMenit){ 
        if (durasiMenit > 0){
            this.durasiMenit = durasiMenit; 
        } else {
            this.durasiMenit = 0;
        }
    }

    public int getHarga() { return harga; }
    public void setHarga(int harga){ 
        if(harga > 0){
            this.harga = harga;
        }else{
            this.harga = 0;
        }
    }

    public String getGenre() { return genre; }
    public void setGenre(String genre) { this.genre = genre; }

    public String getRumahProduksi() { return rumahProduksi; }
    public void setRumahProduksi(String rumahProduksi) { this.rumahProduksi = rumahProduksi; }

}
