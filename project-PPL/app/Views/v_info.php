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
<p>INFO</p>
<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
        <span class="text-muted">Footer</span>
    </div>
</footer>
<?= $this->endSection() ?>