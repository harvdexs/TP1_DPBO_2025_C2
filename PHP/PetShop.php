<?php
session_start();

class PetShop {
    private $toolID;
    private $namaProduk;
    private $kategoriProduk;
    private $hargaProduk;
    private $fotoProduk;

    public function __construct($id, $nama, $kategori, $harga, $foto) {
        $this->toolID = $id;
        $this->namaProduk = $nama;
        $this->kategoriProduk = $kategori;
        $this->hargaProduk = $harga;
        $this->fotoProduk = $foto;
    }

    public function getToolID() { return $this->toolID; }
    public function getNamaProduk() { return $this->namaProduk; }
    public function getKategoriProduk() { return $this->kategoriProduk; }
    public function getHargaProduk() { return $this->hargaProduk; }
    public function getFotoProduk() { return $this->fotoProduk; }

    public static function tampilkanProduk($daftarProduk) {
        echo "
        <form method='GET' action='index.php'>
            <input type='text' name='search' placeholder='Cari produk...' />
            <button type='submit'>Cari</button>
            <a href='tambah.php'><button type='button'>Tambah Data</button></a>
        </form>";

        echo "<h2>Daftar Produk:</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Nama Produk</th><th>Kategori</th><th>Harga</th><th>Foto</th><th>Aksi</th></tr>";

        foreach ($daftarProduk as $produk) {
            echo "<tr>";
            echo "<td>" . $produk->getToolID() . "</td>";
            echo "<td>" . $produk->getNamaProduk() . "</td>";
            echo "<td>" . $produk->getKategoriProduk() . "</td>";
            echo "<td>" . $produk->getHargaProduk() . "</td>";
            echo "<td><img src='" . $produk->getFotoProduk() . "' width='100'></td>";
            echo "<td>
                    <a href='edit.php?id=" . $produk->getToolID() . "'><button>Edit</button></a>
                    <a href='index.php?hapus=" . $produk->getToolID() . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>
                        <button style='background-color:red; color:white;'>Hapus</button>
                    </a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
