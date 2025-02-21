class PetShop:
    daftarProduk = []

    def __init__(self, toolID=0, namaProduk="", kategoriProduk="", hargaProduk=0):
        self.toolID = toolID
        self.namaProduk = namaProduk
        self.kategoriProduk = kategoriProduk
        self.hargaProduk = hargaProduk

    # Accessor dan Mutator
    def setID(self, id):
        self.toolID = id

    def setNama(self, nama):
        self.namaProduk = nama

    def setKategori(self, kategori):
        self.kategoriProduk = kategori

    def setHarga(self, harga):
        self.hargaProduk = harga

    def getID(self):
        return self.toolID

    def getNama(self):
        return self.namaProduk

    def getKategori(self):
        return self.kategoriProduk

    def getHarga(self):
        return self.hargaProduk

    # Menampilkan semua produk
    def tampilkanProduk(self):
        print("\nDaftar Produk:")
        print(f"{'ID':<5} {'Nama':<20} {'Kategori':<15} {'Harga':<10}")
        for produk in PetShop.daftarProduk:
            print(f"{produk.getID():<5} {produk.getNama():<20} {produk.getKategori():<15} {produk.getHarga():<10}")

    # Menambahkan produk baru
    def tambahProduk(self, produkBaru):
        PetShop.daftarProduk.append(produkBaru)
        print("Produk berhasil ditambahkan!")

    # Mengubah produk berdasarkan ID
    def ubahProduk(self, id, produkBaru):
        for i, produk in enumerate(PetShop.daftarProduk):
            if produk.getID() == id:
                PetShop.daftarProduk[i] = produkBaru
                print("Produk berhasil diubah!")
                return
        print("Produk dengan ID tersebut tidak ditemukan.")

    # Menghapus produk berdasarkan ID
    def hapusProduk(self, id):
        for i, produk in enumerate(PetShop.daftarProduk):
            if produk.getID() == id:
                del PetShop.daftarProduk[i]
                print("Produk berhasil dihapus!")
                return
        print("Produk dengan ID tersebut tidak ditemukan.")

    # Mencari produk berdasarkan nama
    def cariProduk(self, nama):
        print("\nHasil Pencarian:")
        for produk in PetShop.daftarProduk:
            if produk.getNama().lower() == nama.lower():
                print(f"ID: {produk.getID()}, Nama: {produk.getNama()}, Kategori: {produk.getKategori()}, Harga: {produk.getHarga()}")
                return
        print("Produk tidak ditemukan.")
