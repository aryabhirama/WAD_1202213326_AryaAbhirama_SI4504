<?php
require 'function.php';
$barang = query("SELECT * FROM barang_add");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arya Abhirama</title>
</head>
<body>
    <h1>Daftar Barang Alfamadun</h1>

    <a href="tambah.php">Tambah Data Barang Alfamadun</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
        </tr>
        <?php $i = 1;
        foreach ($barang as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?no=<?= $row['no']; ?>">Ubah</a>
                    <a href="hapus.php?no=<?= $row['no'];?>" onclick="return confirm('Yakin dihapus nih?');">Hapus</a>
                </td>
                <td><img src="image/<?= $row['gambar']; ?>" width="50"></td>
                <td><?= $row['namabarang']; ?></td>
                <td><?= $row['kodebarang']; ?></td>
                <td><?= $row['hargajual']; ?></td>
                <td><?= $row['stokbarang']; ?></td>
            </tr>
            <?php
            $i++;
            endforeach;
            ?>
    </table>
</body>
</html>
