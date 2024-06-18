<?= $this->extend('v_template') ?>

<?= $this->section('header') ?>
    <h1>Header</h1>
<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
    <li><a href="<?= base_url('/home') ?>">Home</a></li>
    <li><a href="<?= base_url('/info') ?>">Info</a></li>
    <li><a href="<?= base_url('/Tbarang') ?>">Barang</a></li>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Detail Barang</h1>

    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
        </tr>
        <tr>  
            <td><?= $barang['kodeBarang']; ?></td>
            <td><?= $barang['namaBarang']; ?></td>
            <td><?= $barang['hargaBarang']; ?></td>
        </tr>
    </table>
 <a href="<?= base_url('/Tbarang') ?>">Kembali</a>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <p>footer</p>
<?= $this->endSection() ?>
