<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $berita['judul_berita'] ?>
    </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }

        .news-detail {
            margin: 20px auto;
            max-width: 800px;
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

        .card-img-top {
            height: auto;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PortalBerita</a>
        </div>
    </nav>
    <div class="container news-detail">
        <div class="card">
            <img src="<?= base_url('uploads/' . $berita['gambar_berita']) ?>" class="card-img-top"
                alt="<?= $berita['judul_berita'] ?>">
            <div class="card-body">
                <h5 class="card-title">
                    <?= $berita['judul_berita'] ?>
                </h5>
                <p class="card-text">
                    <?= $berita['deskripsi_berita'] ?>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>