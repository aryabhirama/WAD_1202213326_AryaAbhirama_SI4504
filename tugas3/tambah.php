<?php
require 'function.php';

if (isset($_POST["submit"])) {
    $data = [
        'kodebarang' => $_POST['kodebarang'],
        'namabarang' => $_POST['namabarang'],
        'hargajual' => $_POST['hargajual'],
        'stokbarang' => $_POST['stokbarang'],
        'gambarbarang' => $_POST['gambarbarang']
    ];

    if (tambah($data) > 0) {
        $message = 'Sukses!';
    } else {
        $message = 'Coba lagi masih gagal!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang Alfamadun</title>
</head>
<body>
    <h1>Tambah Data Barang Alfamadun</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="kodebarang">Kode Barang</label>
                <input type="text" name="kodebarang" id="kodebarang">
            </li>
            <li>
                <label for="namabarang">Nama Barang</label>
                <input type="text" name="namabarang" id="namabarang">
            </li>
            <li>
                <label for="hargajual">Harga Barang</label>
                <input type="text" name="hargajual" id="hargajual">
            </li>
            <li>
                <label for="stokbarang">Stok Barang</label>
                <input type="text" name="stokbarang" id="stokbarang">
            </li>
            <li>
                <label for="gambarbarang">Gambar Barang</label>
                <input type="text" name="gambarbarang" id="gambarbarang">
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
