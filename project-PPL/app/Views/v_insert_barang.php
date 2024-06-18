<?= $this->extend('v_template') ?>

<?= $this->section('header') ?>
<div class="text-center">
    <h1>Header</h1>
</div>
<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
            <a class="navbar-brand" href="<?= base_url('/home') ?>">Home</a>
            <a class="navbar-brand" href="<?= base_url('/info') ?>">Info</a>
            <a class="navbar-brand" href="<?= base_url('/Tbarang') ?>">Barang</a>
    </div>
</nav>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    
<div class="container mt-5">
        <h1 class="mb-4">Insert Barang</h1>
        <form action="<?= base_url('barang/insert') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="kodeBarang" value="<?= $kodeBarang; ?>">
            </div>
            <div class="form-group">
                <label for="namaBarang">Nama Barang:</label>
                <input type="text" class="form-control" name="namaBarang" id="namaBarang" required>
            </div>
            <div class="form-group">
                <label for="hargaBarang">Harga Barang:</label>
                <input type="number" class="form-control" name="hargaBarang" id="hargaBarang" required>
            </div>
            <!-- Input file untuk mengunggah gambar -->
            <div class="form-group">
                <label for="fotoBarang">Foto Barang:</label>
                <input type="file" class="form-control-file" name="fotoBarang" id="fotoBarang" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Insert</button>
        </form>
    </div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Footer</span>
        </div>
    </footer>
<?= $this->endSection() ?>
