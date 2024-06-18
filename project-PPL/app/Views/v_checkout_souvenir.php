<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Checkout</h1>
        <h2>Order Summary</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">Subtotal</td>
                    <td>Rp <?= number_format($totalPrice, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="3">Ongkos Kirim</td>
                    <td>Rp <?= number_format($ongkir, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="3">Grand Total</td>
                    <td>Rp <?= number_format($grandTotal, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <a href="<?= site_url('souvenir/viewCart') ?>" class="btn btn-primary">Back to Cart</a>
        <!-- Other checkout options like payment gateway integration, form submission, etc. -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
