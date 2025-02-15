#include <iostream>
#include <string>

using namespace std;

//menetapkan max produk 
const int MAX_PRODUK = 100;

class PetShop {
private:
//atribut
    int toolID;
    string namaProduk;
    string kategoriProduk;
    int hargaProduk;

public:
    // Konstruktor kosong
    PetShop() {
        this->toolID = 0;
        this->namaProduk = "";
        this->kategoriProduk = "";
        this->hargaProduk = 0;
    }

    // Konstruktor dengan parameter
    PetShop(int id, string nama, string kategori, int harga) {
        this->toolID = id;
        this->namaProduk = nama;
        this->kategoriProduk = kategori;
        this->hargaProduk = harga;
    }

    // Accessors (Getter dan Setter)
    void setID(int id){ 
        this->toolID = id; 
    }
    void setNama(string nama){ 
        this->namaProduk = nama; 
    }
    void setKategori(string kategori){ 
        this->kategoriProduk = kategori; 
    }
    
    void setHarga(int harga){ 
        this->hargaProduk = harga; 
    }

    int getID(){ 
        return this->toolID; 
    }
    string getNama(){ 
        return this->namaProduk; 
    }
    string getKategori(){ 
        return this->kategoriProduk; 
    }
    int getHarga(){ 
        return this->hargaProduk; 
    }

    // Menampilkan daftar produk
    void tampilkanProduk(PetShop daftarProduk[], int jumlahProduk) {
        cout << "ID       Nama Produk          Kategori        Harga" << endl;
        cout << "--------------------------------------------------------" << endl;
        for (int i = 0; i < jumlahProduk; i++) {
            cout << daftarProduk[i].getID() << "       "
                 << daftarProduk[i].getNama() << "          "
                 << daftarProduk[i].getKategori() << "        "
                 << daftarProduk[i].getHarga() << endl;
        }
    }

    // Menambahkan produk baru
    void tambahProduk(PetShop daftarProduk[], int& jumlahProduk, PetShop produkBaru) {
        if (jumlahProduk < MAX_PRODUK) {
            daftarProduk[jumlahProduk] = produkBaru;
            jumlahProduk++;
        } else {
            cout << "Tidak bisa menambahkan produk. Kapasitas penuh!" << endl;
        }
    }

    // Mengubah data produk berdasarkan ID
    void ubahProduk(PetShop daftarProduk[], int jumlahProduk, int id, PetShop produkBaru) {
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getID() == id) {
                daftarProduk[i] = produkBaru;
                return;
            }
        }
        cout << "Produk dengan ID " << id << " tidak ditemukan." << endl;
    }

    // Menghapus produk berdasarkan ID
    void hapusProduk(PetShop daftarProduk[], int& jumlahProduk, int id) {
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getID() == id) {
                for (int j = i; j < jumlahProduk - 1; j++) {
                    daftarProduk[j] = daftarProduk[j + 1];
                }
                jumlahProduk--;
                return;
            }
        }
        cout << "Produk dengan ID " << id << " tidak ditemukan." << endl;
    }

    // Mencari produk berdasarkan nama
    void cariProduk(PetShop daftarProduk[], int jumlahProduk, string nama) {
        cout << "Hasil pencarian untuk '" << nama << "':" << endl;
        for (int i = 0; i < jumlahProduk; i++) {
            if (daftarProduk[i].getNama() == nama) {
                cout << daftarProduk[i].getID() << "       "
                     << daftarProduk[i].getNama() << "          "
                     << daftarProduk[i].getKategori() << "        "
                     << daftarProduk[i].getHarga() << endl;
            }
        }
    }
};
