<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Souvenir</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Timeless Threads Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('souvenir/cart') ?>">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="cardContainer" class="container card-container mt-5">
        <div class="row">
            <?php foreach ($souvenirs as $souvenir) { ?>
                <div class="col-md-3 mb-4"> <!-- Menggunakan col-md-3 untuk 4 kolom -->
                    <div class="card">
                        <img src="<?= base_url('uploads/' . $souvenir['namafilegbr']) ?>" class="card-img-top"
                            alt="<?= $souvenir['namasouvenir'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $souvenir['namasouvenir'] ?>
                            </h5>
                            <p class="card-text">Harga: Rp
                                <?= number_format($souvenir['harga'], 0, ',', '.') ?>
                            </p>
                            <p class="card-text">Stok:
                                <?= $souvenir['stok'] ?>
                            </p>
                            <p class="card-text">Berat:
                                <?= $souvenir['berat'] ?> gram
                            </p>
                        </div>
                        <div class="card-footer">
                            <form action="<?= site_url('souvenir/addToCart/' . $souvenir['idsouvenir']) ?>" method="post">
                                <input type="hidden" name="quantity" value="1"> <!-- Default quantity is 1 -->
                                <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Custom JavaScript -->
    <script src="<?= base_url('js/script.js') ?>"></script>
</body>
</html>
