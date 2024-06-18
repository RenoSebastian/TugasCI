<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                        <a class="nav-link" href="<?= base_url('cart') ?>"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter by Gender
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('barang/filterByGender/Pria') ?>">Pria</a>
                            <a class="dropdown-item" href="<?= base_url('barang/filterByGender/Wanita') ?>">Wanita</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form id="searchForm" action="<?= base_url('barang/search') ?>" method="post"
                            class="form-inline my-2 my-lg-0">
                            <input id="genderInput" type="hidden" name="gender" value="">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                name="keyword">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="cardContainer" class="container card-container mt-5">
        <div class="row">
            <?php foreach ($barang as $row): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url('uploads/' . $row['gambar_barang']) ?>" class="card-img-top"
                            alt="<?= $row['nama_barang'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                            <p class="card-text">Harga: Rp <?= number_format($row['harga_barang'], 0, ',', '.') ?></p>
                            <p class="card-text">Deskripsi: <?= $row['deskripsi_barang'] ?></p>
                            <p class="card-text">Gender: <?= ucfirst($row['gender_barang']) ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="<?= site_url('barang/addToCart') ?>" method="post">
                                <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                                <input type="hidden" name="quantity" value="1"> <!-- Default quantity is 1 -->
                                <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
