import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        final int MAX_PRODUK = 100;
        PetShop[] daftarProduk = new PetShop[MAX_PRODUK];
        int jumlahProduk = 0;

        // Hardcode beberapa data awal
        daftarProduk[jumlahProduk++] = new PetShop(1, "Dog Food", "Makanan", 50000);
        daftarProduk[jumlahProduk++] = new PetShop(2, "Cat Food", "Makanan", 45000);
        daftarProduk[jumlahProduk++] = new PetShop(3, "Bird Cage", "Aksesoris", 150000);
        daftarProduk[jumlahProduk++] = new PetShop(4, "Cat Litter", "Perawatan", 30000);

        Scanner scanner = new Scanner(System.in);

        while (true) {
            System.out.println("\nMenu PetShop:");
            System.out.println("1. Tampilkan Produk");
            System.out.println("2. Tambah Produk");
            System.out.println("3. Ubah Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilih opsi: ");
            int pilihan = scanner.nextInt();

            if (pilihan == 1) {
                PetShop.tampilkanProduk(daftarProduk, jumlahProduk);
            } else if (pilihan == 2) {
                System.out.print("Masukkan ID: ");
                int id = scanner.nextInt();
                scanner.nextLine();  // Membersihkan buffer
                System.out.print("Masukkan Nama Produk: ");
                String nama = scanner.nextLine();
                System.out.print("Masukkan Kategori Produk: ");
                String kategori = scanner.nextLine();
                System.out.print("Masukkan Harga Produk: ");
                int harga = scanner.nextInt();
                PetShop produkBaru = new PetShop(id, nama, kategori, harga);
                PetShop.tambahProduk(daftarProduk, jumlahProduk++, produkBaru);
            } else if (pilihan == 3) {
                System.out.print("Masukkan ID produk yang ingin diubah: ");
                int id = scanner.nextInt();
                scanner.nextLine();
                System.out.print("Masukkan Nama Baru: ");
                String nama = scanner.nextLine();
                System.out.print("Masukkan Kategori Baru: ");
                String kategori = scanner.nextLine();
                System.out.print("Masukkan Harga Baru: ");
                int harga = scanner.nextInt();
                PetShop produkBaru = new PetShop(id, nama, kategori, harga);
                PetShop.ubahProduk(daftarProduk, jumlahProduk, id, produkBaru);
            } else if (pilihan == 4) {
                System.out.print("Masukkan ID produk yang ingin dihapus: ");
                int id = scanner.nextInt();
                PetShop.hapusProduk(daftarProduk, jumlahProduk--, id);
            } else if (pilihan == 5) {
                System.out.print("Masukkan Nama Produk yang dicari: ");
                scanner.nextLine();  // Membersihkan buffer
                String nama = scanner.nextLine();
                PetShop.cariProduk(daftarProduk, jumlahProduk, nama);
            } else if (pilihan == 6) {
                System.out.println("Keluar dari program.");
                break;
            } else {
                System.out.println("Pilihan tidak valid!");
            }
        }

        scanner.close();
    }
}
