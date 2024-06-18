<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }

        .news-container {
            margin-top: 20px;
        }

        .news-item {
            margin-bottom: 20px;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .card-title {
            color: #007bff;
        }

        .card-text {
            color: #495057;
        }

        .read-more-button {
            margin-top: 10px;
            background-color: #007bff;
            border-color: #007bff;
        }

        .read-more-button:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PortalBerita</a>
        </div>
    </nav>
    <div class="container news-container">
        <div class="row">
            <?php foreach ($berita as $item): ?>
                <div class="col-md-6 news-item">
                    <div class="card">
                        <img src="<?= base_url('uploads/' . $item['gambar_berita']) ?>" class="card-img-top"
                            alt="<?= $item['judul_berita'] ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $item['judul_berita'] ?>
                            </h5>
                            <p class="card-text">
                                <?= $item['deskripsi_berita'] ?>
                            </p>
                            <a href="<?= base_url('berita/detail/' . $item['id_berita']) ?>"
                                class="btn btn-primary read-more-button">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>