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
                    <td>Rp <span id="ongkir_total"><?= number_format($ongkir, 0, ',', '.') ?></span></td>
                </tr>
                <tr>
                    <td colspan="3">Grand Total</td>
                    <td>Rp <?= number_format($grandTotal, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <form action="<?= site_url('souvenir/submitOrder') ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nohp">No. HP</label>
                <input type="text" class="form-control" id="nohp" name="nohp" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <select class="form-control" id="alamat" name="alamat" required onchange="hitungOngkir(this)">
                    <option value="">Pilih Alamat</option>
                    <?php foreach ($ongkirs as $ongkir): ?>
                        <option value="<?= $ongkir['kode_pos_tujuan'] ?>" 
                                data-ongkir-per-kg="<?= $ongkir['ongkir_per_kg'] ?>"
                                data-berat="<?= $totalWeight ?>">
                            <?= $ongkir['kode_pos_tujuan'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function hitungOngkir(select) {
            var selectedOption = select.options[select.selectedIndex];
            var ongkirPerKg = selectedOption.getAttribute('data-ongkir-per-kg');
            var berat = selectedOption.getAttribute('data-berat');
            var ongkirTotal = berat * ongkirPerKg;

            document.getElementById('ongkir_total').innerText = formatCurrency(ongkirTotal);
        }

        function formatCurrency(amount) {
            return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
</body>
</html>
