// Saya Harold Vidian Exaudi Simarmata dengan NIM 2102292 mengerjakan Tugas Praktikum 1 
// dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya, 
// maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

#include <iostream>
#include <string>
#include "PetShop.cpp"

using namespace std;

int main() {
    PetShop daftarProduk[MAX_PRODUK];
    int jumlahProduk = 0;

    // Hardcode beberapa data awal
    daftarProduk[jumlahProduk++] = PetShop(1, "Dog Food", "Makanan", 50000);
    daftarProduk[jumlahProduk++] = PetShop(2, "Cat Food", "Makanan", 45000);
    daftarProduk[jumlahProduk++] = PetShop(3, "Bird Cage", "Aksesoris", 150000);
    daftarProduk[jumlahProduk++] = PetShop(4, "Cat Litter", "Perawatan", 30000);

    while (true) {
        cout << "\nMenu PetShop:\n";
        cout << "1. Tampilkan Produk\n";
        cout << "2. Tambah Produk\n";
        cout << "3. Ubah Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilih opsi: ";
        int pilihan;
        cin >> pilihan;

        if (pilihan == 1) {
            daftarProduk[0].tampilkanProduk(daftarProduk, jumlahProduk);
        } else if (pilihan == 2) {
            int id, harga;
            string nama, kategori;
            cout << "Masukkan ID: ";
            cin >> id;
            cin.ignore();
            cout << "Masukkan Nama Produk: ";
            getline(cin, nama);
            cout << "Masukkan Kategori Produk: ";
            getline(cin, kategori);
            cout << "Masukkan Harga Produk: ";
            cin >> harga;
            PetShop produkBaru(id, nama, kategori, harga);
            daftarProduk[0].tambahProduk(daftarProduk, jumlahProduk, produkBaru);
        } else if (pilihan == 3) {
            int id, harga;
            string nama, kategori;
            cout << "Masukkan ID produk yang ingin diubah: ";
            cin >> id;
            cin.ignore();
            cout << "Masukkan Nama Baru: ";
            getline(cin, nama);
            cout << "Masukkan Kategori Baru: ";
            getline(cin, kategori);
            cout << "Masukkan Harga Baru: ";
            cin >> harga;
            PetShop produkBaru(id, nama, kategori, harga);
            daftarProduk[0].ubahProduk(daftarProduk, jumlahProduk, id, produkBaru);
        } else if (pilihan == 4) {
            int id;
            cout << "Masukkan ID produk yang ingin dihapus: ";
            cin >> id;
            daftarProduk[0].hapusProduk(daftarProduk, jumlahProduk, id);
        } else if (pilihan == 5) {
            string nama;
            cout << "Masukkan Nama Produk yang dicari: ";
            cin.ignore();
            getline(cin, nama);
            daftarProduk[0].cariProduk(daftarProduk, jumlahProduk, nama);
        } else if (pilihan == 6) {
            break;
        } else {
            cout << "Pilihan tidak valid!" << endl;
        }
    }

    return 0;
}
