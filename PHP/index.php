<?php
include 'PetShop.php';


// Cek apakah file produk.json ada dan tidak kosong
if (!file_exists('produk.json') || filesize('produk.json') == 0) {
    // Simpan data hardcoded ke file JSON
    file_put_contents('produk.json', json_encode($defaultProduk, JSON_PRETTY_PRINT));
}

// Baca data dari JSON
$jsonData = file_get_contents('produk.json');
$produkArray = json_decode($jsonData, true);

$daftarProduk = [];

// Konversi array JSON menjadi objek
foreach ($produkArray as $item) {
    $produk = new PetShop();
    $produk->isiDataProduk($item['toolID'], $item['namaProduk'], $item['kategoriProduk'], $item['hargaProduk'], $item['fotoProduk']);
    $daftarProduk[] = $produk;
}

// Hapus produk berdasarkan ID
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $daftarProduk = array_filter($daftarProduk, function ($produk) use ($id) {
        return $produk->getToolID() != $id;
    });

    // Simpan perubahan ke JSON
    file_put_contents('produk.json', json_encode(array_values(array_map(function ($produk) {
        return [
            'toolID' => $produk->getToolID(),
            'namaProduk' => $produk->getNamaProduk(),
            'kategoriProduk' => $produk->getKategoriProduk(),
            'hargaProduk' => $produk->getHargaProduk(),
            'fotoProduk' => $produk->getFotoProduk()
        ];
    }, $daftarProduk)), JSON_PRETTY_PRINT));
}

// Cari data jika ada parameter search
if (isset($_GET['search'])) {
    $search = strtolower($_GET['search']);
    $daftarProduk = array_filter($daftarProduk, function($produk) use ($search) {
        return strpos(strtolower($produk->getNamaProduk()), $search) !== false;
    });
}

// Tampilkan daftar produk
$petshop = new PetShop();
$petshop->tampilkanProduk($daftarProduk);
?>
