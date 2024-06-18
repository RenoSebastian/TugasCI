<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
</head>
<body>
<h1>Daftar Barang</h1>

<!-- Form pencarian -->
<form action="<?= base_url('barang/search') ?>" method="post">
    <input type="text" name="keyword" placeholder="Cari barang...">
    <button type="submit">Cari</button>
</form>

<!-- Tautan untuk menuju halaman insert barang -->
<a href="<?= base_url('barang/insert') ?>">Tambah Barang</a>

<?php if (!empty($barang)) : ?>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($barang as $brg) : ?>
        <tr>  
            <td><?= $brg['kodeBarang']; ?></td>
            <td><?= $brg['namaBarang']; ?></td>
            <td><?= $brg['hargaBarang']; ?></td>
            <td>
                <!-- Membuat tombol Delete dengan form -->
                <a href="/barang/delete/<?= $brg['kodeBarang']; ?>">
                    delete
                </a>
                <!-- Tombol Update -->
                <a href="/barang/update/<?= $brg['kodeBarang']; ?>">
                    update
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <p>Tidak ada barang yang ditemukan.</p>
<?php endif; ?>

</body>
</html>
