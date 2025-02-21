<?php
include 'PetShop.php';

if (!isset($_SESSION['daftarProduk'])) {
    $_SESSION['daftarProduk'] = [
        new PetShop(1, "Dog Food", "Makanan", 50000, "assets/dogfood.jpg"),
        new PetShop(2, "Cat Food", "Makanan", 35000, "assets/catfood.jpg"),
        new PetShop(3, "Bird Cage", "Aksesoris", 150000, "assets/birdcage.jpg"),
    ];
}

$daftarProduk = $_SESSION['daftarProduk'];

// Hapus produk + hapus file gambar dari folder
if (isset($_GET['hapus'])) {
    $hapusID = $_GET['hapus'];
    foreach ($daftarProduk as $index => $produk) {
        if ($produk->getToolID() == $hapusID) {
            $foto = $produk->getFotoProduk();
            if (file_exists($foto)) {
                unlink($foto);
            }
            unset($_SESSION['daftarProduk'][$index]);
            break;
        }
    }
    $_SESSION['daftarProduk'] = array_values($_SESSION['daftarProduk']);
    header("Location: index.php");
    exit();
}

// Pencarian produk
if (isset($_GET['search'])) {
    $search = strtolower($_GET['search']);
    $daftarProduk = array_filter($daftarProduk, function ($produk) use ($search) {
        return strpos(strtolower($produk->getNamaProduk()), $search) !== false;
    });
}

PetShop::tampilkanProduk($daftarProduk);
?>
