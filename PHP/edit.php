<?php
include 'PetShop.php';

// Baca data JSON
$jsonData = file_get_contents('produk.json');
$produkArray = json_decode($jsonData, true);

// Cari produk berdasarkan ID
$toolID = $_GET['id'];
$produkIndex = array_search($toolID, array_column($produkArray, 'toolID'));

if ($produkIndex === false) {
    die("Produk tidak ditemukan!");
}

$produk = $produkArray[$produkIndex];

// Update data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produkArray[$produkIndex]['namaProduk'] = $_POST['namaProduk'];
    $produkArray[$produkIndex]['kategoriProduk'] = $_POST['kategoriProduk'];
    $produkArray[$produkIndex]['hargaProduk'] = $_POST['hargaProduk'];

    // Upload foto baru jika ada
    if ($_FILES['fotoProduk']['name'] != "") {
        $fotoProduk = $_FILES['fotoProduk']['name'];
        $targetDir = "assets/";
        $targetFile = $targetDir . basename($fotoProduk);
        move_uploaded_file($_FILES['fotoProduk']['tmp_name'], $targetFile);
        $produkArray[$produkIndex]['fotoProduk'] = $targetFile;
    }

    // Simpan perubahan ke JSON
    file_put_contents('produk.json', json_encode($produkArray, JSON_PRETTY_PRINT));

    header('Location: index.php');
    exit();
}
?>

<form method="POST" action="edit.php?id=<?php echo $toolID; ?>" enctype="multipart/form-data">
    <label>ID:</label>
    <input type="text" name="toolID" value="<?php echo $produk['toolID']; ?>" required /><br />
    <label>Nama Produk:</label>
    <input type="text" name="namaProduk" value="<?php echo $produk['namaProduk']; ?>" required /><br />
    <label>Kategori:</label>
    <input type="text" name="kategoriProduk" value="<?php echo $produk['kategoriProduk']; ?>" required /><br />
    <label>Harga:</label>
    <input type="number" name="hargaProduk" value="<?php echo $produk['hargaProduk']; ?>" required /><br />
    <label>Foto:</label>
    <input type="file" name="fotoProduk" /><br />
    <img src="<?php echo $produk['fotoProduk']; ?>" width="100"><br />
    <button type="submit">Update Data</button>
</form>
