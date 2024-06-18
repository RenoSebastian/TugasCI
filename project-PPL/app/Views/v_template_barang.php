<?= $this->extend('v_template') ?>

<?= $this->section('header') ?>
<div class="text-center">
    <h1>Header</h1>
</div>
<?= $this->endSection() ?>

<?= $this->section('navbar') ?>
<?= $this->include('navbar') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1 class="text-center">Daftar Barang</h1>
    <form class="form-inline justify-content-center mb-3" action="<?= base_url('/Tbarang/search') ?>" method="post">
        <input type="text" class="form-control mr-sm-2" name="keyword" placeholder="Cari barang...">
        <button class="btn btn-primary" type="submit">Cari</button>
    </form>
    <!-- Tautan untuk menuju halaman insert barang -->
    <div class="text-center mb-3">
        <a class="btn btn-success" href="<?= base_url('barang/insert') ?>">Tambah Barang</a>
    </div>
    <!-- Form untuk menambah barang -->
    <div class="container">
        <?php if (!empty($barang)): ?>
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $row): ?>
                        <tr>
                            <?php foreach ($row as $key => $cell): ?>
                                <?php if ($key === 'hargaBarang'): ?>
                                    <td>
                                        <?= 'Rp' . number_format($cell, 2, ',', '.') ?>
                                    </td>
                                <?php elseif ($key === 'fotoBarang'): ?>
                                    <td><img src="<?= base_url('foto/' . $cell) ?>" alt="<?= $row['namaBarang'] ?>"
                                            class="img-thumbnail" style="max-width: 100px;"></td>
                                <?php else: ?>
                                    <td>
                                        <?= $cell ?>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td>
                                <button onclick="window.location='<?= base_url('Tbarang/detail/' . $row['kodeBarang']) ?>'">View
                                    Detail</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="pagination">
                <?php if (isset($pager)): ?>
                    <?= $pager->links() ?>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <!-- No Data Message -->
            <p class="text-center">Tidak ada barang yang ditemukan.</p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Footer</span>
    </div>
</footer>
<?= $this->endSection() ?>