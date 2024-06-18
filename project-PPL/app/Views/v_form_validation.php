<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Validation</h1>
        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>
        <form action="/form/submit" method="post">
            <div class="form-group">
                <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?= old('nip') ?>">
            </div>
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= old('nama') ?>">
            </div>
            <div class="form-group">
                <input type="date" name="tgl_lahir" class="form-control" value="<?= old('tgl_lahir') ?>">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="male" <?= old('gender') == 'male' ? 'checked' : '' ?>>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="female" <?= old('gender') == 'female' ? 'checked' : '' ?>>
                    <label class="form-check-label">Female</label>
                </div>
            </div>
            <div class="form-group">
                <select name="pendidikan" class="form-control">
                    <option value="sd" <?= old('pendidikan') == 'sd' ? 'selected' : '' ?>>SD</option>
                    <option value="smp" <?= old('pendidikan') == 'smp' ? 'selected' : '' ?>>SMP</option>
                    <option value="sma" <?= old('pendidikan') == 'sma' ? 'selected' : '' ?>>SMA</option>
                    <option value="d3" <?= old('pendidikan') == 'd3' ? 'selected' : '' ?>>D3</option>
                    <option value="d4" <?= old('pendidikan') == 'd4' ? 'selected' : '' ?>>D4</option>
                    <option value="s1" <?= old('pendidikan') == 's1' ? 'selected' : '' ?>>S1</option>
                    <option value="s2" <?= old('pendidikan') == 's2' ? 'selected' : '' ?>>S2</option>
                    <option value="s3" <?= old('pendidikan') == 's3' ? 'selected' : '' ?>>S3</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" value="<?= old('no_hp') ?>">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
