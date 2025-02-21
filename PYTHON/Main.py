from PetShop import PetShop

def main():
    petshop = PetShop()

    # Hardcode beberapa data awal
    PetShop.daftarProduk.append(PetShop(1, "Dog Food", "Makanan", 50000))
    PetShop.daftarProduk.append(PetShop(2, "Cat Food", "Makanan", 45000))
    PetShop.daftarProduk.append(PetShop(3, "Bird Cage", "Aksesoris", 150000))
    PetShop.daftarProduk.append(PetShop(4, "Cat Litter", "Perawatan", 30000))

    while True:
        print("\nMenu PetShop:")
        print("1. Tampilkan Produk")
        print("2. Tambah Produk")
        print("3. Ubah Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk")
        print("6. Keluar")
        pilihan = input("Pilih opsi: ")

        if pilihan == '1':
            petshop.tampilkanProduk()
        elif pilihan == '2':
            id = int(input("Masukkan ID: "))
            nama = input("Masukkan Nama Produk: ")
            kategori = input("Masukkan Kategori Produk: ")
            harga = int(input("Masukkan Harga Produk: "))
            produkBaru = PetShop(id, nama, kategori, harga)
            petshop.tambahProduk(produkBaru)
        elif pilihan == '3':
            id = int(input("Masukkan ID produk yang ingin diubah: "))
            nama = input("Masukkan Nama Baru: ")
            kategori = input("Masukkan Kategori Baru: ")
            harga = int(input("Masukkan Harga Baru: "))
            produkBaru = PetShop(id, nama, kategori, harga)
            petshop.ubahProduk(id, produkBaru)
        elif pilihan == '4':
            id = int(input("Masukkan ID produk yang ingin dihapus: "))
            petshop.hapusProduk(id)
        elif pilihan == '5':
            nama = input("Masukkan Nama Produk yang dicari: ")
            petshop.cariProduk(nama)
        elif pilihan == '6':
            print("Keluar dari program.")
            break
        else:
            print("Pilihan tidak valid!")

if __name__ == "__main__":
    main()
