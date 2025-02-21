<?php
include 'PetShop.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // ID diinput manual
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Proses upload file
    $targetDir = "assets/";
    $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile);

    $produkBaru = new PetShop($id, $nama, $kategori, $harga, $targetFile);
    $_SESSION['daftarProduk'][] = $produkBaru;

    header("Location: index.php");
    exit();
}
?>

<form method="POST" enctype="multipart/form-data">
    <label>ID Produk:</label><input type="number" name="id" required><br>
    <label>Nama Produk:</label><input type="text" name="nama" required><br>
    <label>Kategori:</label><input type="text" name="kategori" required><br>
    <label>Harga:</label><input type="number" name="harga" required><br>
    <label>Foto:</label><input type="file" name="foto" required><br>
    <button type="submit">Tambah</button>
    <a href="index.php"><button type="button">Batal</button></a>
</form>
