<?php
require 'function.php';

$no = $_GET["no"];
$brg = query("SELECT * FROM barang_add WHERE no = $no")[0];

if (isset($_POST["submit"])) {
    $data = [
        'no' => $_POST['no'],
        'kodebarang' => $_POST['kodebarang'],
        'namabarang' => $_POST['namabarang'],
        'gambar' => $_POST['gambarbarang'],
        'hargajual' => $_POST['hargajual'],
        'stokbarang' => $_POST['stokbarang'],
    ];

    if (ubah($data) > 0) {
        $message = 'Sukses diubah nih!';
    } else {
        $message = 'Gagal nih, coba lagi!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Barang Toko Mama Saya</title>
</head>
<body>
    <h1>Ubah Data Barang Toko Mama Saya</h1>
    <form action="" method="post">
        <input type="hidden" name="no" value="<?= $brg['no']; ?>">
        <ul>
            <li>
                <label for="kodebarang">Kode Barang</label>
                <input type="text" name="kodebarang" id="kodebarang" required value="<?= $brg["kodebarang"]; ?>">
            </li>
            <li>
                <label for="namabarang">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang" required value="<?= $brg["namabarang"]; ?>">
            </li>
            <li>
                <label for="gambarbarang">Gambar Barang</label>
                <input type="text" name="gambarbarang" id="gambarbarang" required value="<?= $brg["gambar"]; ?>">
            </li>
            <li>
                <label for="hargajual">Harga Barang</label>
                <input type="text" name="hargajual" id="hargajual" required value="<?= $brg["hargajual"]; ?>">
            </li>
            <li>
                <label for="stokbarang">Stok Barang</label>
                <input type="text" name="stokbarang" id="stokbarang" required value="<?= $brg["stokbarang"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
    <script>
        <?php if (isset($message)) : ?>
        alert('<?php echo $message; ?>');
        document.location.href = 'index.php';
        <?php endif; ?>
    </script>
</body>
</html>
