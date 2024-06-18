<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("/img/apple-icon.png") ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/favicon.png") ?>">
    <title>Template Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url("/css/nucleo-icons.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("/css/nucleo-svg.css") ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url("/css/nucleo-svg.css") ?>" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url("/css/soft-ui-dashboard.css?v=1.0.7") ?>" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>
    <header>
        <?= $this->renderSection('header') ?>
    </header>

    <nav class="navbar navbar-vertical">
        <?= $this->renderSection('navbar') ?>
    </nav>


    <main>
        <div class="container">
            <!-- Main Content -->
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <footer>
        <!-- Footer Content -->
        <?= $this->renderSection('footer') ?>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>