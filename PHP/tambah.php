<?php
include 'PetShop.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $toolID = $_POST['toolID'];
    $namaProduk = $_POST['namaProduk'];
    $kategoriProduk = $_POST['kategoriProduk'];
    $hargaProduk = $_POST['hargaProduk'];

    // Upload foto
    $fotoProduk = $_FILES['fotoProduk']['name'];
    $targetDir = "assets/";
    $targetFile = $targetDir . basename($fotoProduk);
    move_uploaded_file($_FILES['fotoProduk']['tmp_name'], $targetFile);

    // Baca data dari JSON
    $jsonData = file_get_contents('produk.json');
    $produkArray = json_decode($jsonData, true);

    // Tambahkan produk baru
    $produkArray[] = [
        'toolID' => $toolID,
        'namaProduk' => $namaProduk,
        'kategoriProduk' => $kategoriProduk,
        'hargaProduk' => $hargaProduk,
        'fotoProduk' => $targetFile
    ];

    // Simpan ke JSON
    file_put_contents('produk.json', json_encode($produkArray, JSON_PRETTY_PRINT));

    // Redirect
    header('Location: index.php');
    exit();
}
?>

<form method="POST" action="tambah.php" enctype="multipart/form-data">
    <label>ID:</label>
    <input type="text" name="toolID" required /><br />
    <label>Nama Produk:</label>
    <input type="text" name="namaProduk" required /><br />
    <label>Kategori:</label>
    <input type="text" name="kategoriProduk" required /><br />
    <label>Harga:</label>
    <input type="number" name="hargaProduk" required /><br />
    <label>Foto:</label>
    <input type="file" name="fotoProduk" required /><br />
    <button type="submit">Tambah Data</button>
</form>
