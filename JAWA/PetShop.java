public class PetShop {
    private int toolID;
    private String namaProduk;
    private String kategoriProduk;
    private int hargaProduk;

    // Konstruktor kosong
    public PetShop() {
        this.toolID = 0;
        this.namaProduk = "";
        this.kategoriProduk = "";
        this.hargaProduk = 0;
    }

    // Konstruktor dengan parameter
    public PetShop(int id, String nama, String kategori, int harga) {
        this.toolID = id;
        this.namaProduk = nama;
        this.kategoriProduk = kategori;
        this.hargaProduk = harga;
    }

    // Accessor dan Mutator
    public void setID(int id) {
        this.toolID = id;
    }

    public void setNama(String nama) {
        this.namaProduk = nama;
    }

    public void setKategori(String kategori) {
        this.kategoriProduk = kategori;
    }

    public void setHarga(int harga) {
        this.hargaProduk = harga;
    }

    public int getID() {
        return this.toolID;
    }

    public String getNama() {
        return this.namaProduk;
    }

    public String getKategori() {
        return this.kategoriProduk;
    }

    public int getHarga() {
        return this.hargaProduk;
    }

    // Menampilkan semua produk
    public static void tampilkanProduk(PetShop[] daftarProduk, int jumlahProduk) {
        System.out.println("\nDaftar Produk:");
        System.out.printf("%-5s %-20s %-15s %-10s\n", "ID", "Nama", "Kategori", "Harga");
        for (int i = 0; i < jumlahProduk; i++) {
            System.out.printf("%-5d %-20s %-15s %-10d\n",
                    daftarProduk[i].getID(),
                    daftarProduk[i].getNama(),
                    daftarProduk[i].getKategori(),
                    daftarProduk[i].getHarga());
        }
    }

    // Menambahkan produk baru
    public static void tambahProduk(PetShop[] daftarProduk, int jumlahProduk, PetShop produkBaru) {
        if (jumlahProduk < daftarProduk.length) {
            daftarProduk[jumlahProduk] = produkBaru;
            System.out.println("Produk berhasil ditambahkan!");
        } else {
            System.out.println("Daftar produk sudah penuh!");
        }
    }

    // Mengubah produk berdasarkan ID
    public static void ubahProduk(PetShop[] daftarProduk, int jumlahProduk, int id, PetShop produkBaru) {
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getID() == id) {
                daftarProduk[i] = produkBaru;
                System.out.println("Produk berhasil diubah!");
                return;
            }
        }
        System.out.println("Produk dengan ID tersebut tidak ditemukan.");
    }

    // Menghapus produk berdasarkan ID
    public static void hapusProduk(PetShop[] daftarProduk, int jumlahProduk, int id) {
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getID() == id) {
                for (int j = i; j < jumlahProduk - 1; j++) {
                    daftarProduk[j] = daftarProduk[j + 1];
                }
                daftarProduk[jumlahProduk - 1] = null;
                System.out.println("Produk berhasil dihapus!");
                return;
            }
        }
        System.out.println("Produk dengan ID tersebut tidak ditemukan.");
    }

    // Mencari produk berdasarkan nama
    public static void cariProduk(PetShop[] daftarProduk, int jumlahProduk, String nama) {
        System.out.println("\nHasil Pencarian:");
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getNama().equalsIgnoreCase(nama)) {
                System.out.printf("ID: %d, Nama: %s, Kategori: %s, Harga: %d\n",
                        daftarProduk[i].getID(),
                        daftarProduk[i].getNama(),
                        daftarProduk[i].getKategori(),
                        daftarProduk[i].getHarga());
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }
}
