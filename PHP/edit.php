<?php
include 'PetShop.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$oldId = $_GET['id'];
$produkEdit = null;
$indexEdit = -1;

foreach ($_SESSION['daftarProduk'] as $index => $produk) {
    if ($produk->getToolID() == $oldId) {
        $produkEdit = $produk;
        $indexEdit = $index;
        break;
    }
}

if (!$produkEdit) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newId = $_POST['id']; // ID bisa diedit
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $foto = $produkEdit->getFotoProduk();

    // Proses upload foto jika ada yang baru
    if ($_FILES["foto"]["size"] > 0) {
        if (file_exists($foto)) {
            unlink($foto);
        }
        $targetDir = "assets/";
        $foto = $targetDir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }

    // Hapus data lama, tambahkan yang baru
    unset($_SESSION['daftarProduk'][$indexEdit]);
    $_SESSION['daftarProduk'][] = new PetShop($newId, $nama, $kategori, $harga, $foto);

    // Reset array index agar tetap rapi
    $_SESSION['daftarProduk'] = array_values($_SESSION['daftarProduk']);

    header("Location: index.php");
    exit();
}
?>

<form method="POST" enctype="multipart/form-data">
    <label>ID Produk:</label><input type="number" name="id" value="<?= $produkEdit->getToolID(); ?>" required><br>
    <label>Nama Produk:</label><input type="text" name="nama" value="<?= $produkEdit->getNamaProduk(); ?>" required><br>
    <label>Kategori:</label><input type="text" name="kategori" value="<?= $produkEdit->getKategoriProduk(); ?>" required><br>
    <label>Harga:</label><input type="number" name="harga" value="<?= $produkEdit->getHargaProduk(); ?>" required><br>
    <label>Foto Baru:</label><input type="file" name="foto"><br>
    <button type="submit">Simpan</button>
    <a href="index.php"><button type="button">Batal</button></a>
</form>
