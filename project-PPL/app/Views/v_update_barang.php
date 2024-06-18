<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
</head>
<body>
<h1>Update Barang</h1>

<form action="<?= base_url('barang/update') ?>" method="post">
    <input type="hidden" name="kodeBarang" value="<?= $barang['kodeBarang']; ?>">
    <input type="text" name="namaBarang" value="<?= $barang['namaBarang']; ?>">
    <input type="number" name="hargaBarang" value="<?= $barang['hargaBarang']; ?>">
    <button type="submit">Update</button>
</form>

</body>
</html>
