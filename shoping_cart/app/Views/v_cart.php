<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Your Cart</h1>
        <?php if (empty($cart)): ?>
            <p>Your cart is empty</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td>
                                <?= $item['name'] ?>
                            </td>
                            <td>Rp
                                <?= number_format($item['price'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <?= $item['quantity'] ?>
                            </td>
                            <td>Rp
                                <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                            </td>
                            <td>
                                <a href="<?= site_url('barang/removeItem/' . $item['id']) ?>" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= site_url('barang/clearCart') ?>" class="btn btn-warning">Clear Cart</a>
        <?php endif; ?>
        <a href="<?= site_url('barang') ?>" class="btn btn-primary">Continue Shopping</a>
        <a href="<?= site_url('transaksi/view') ?>" class="btn btn-primary">Checkout</a>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>