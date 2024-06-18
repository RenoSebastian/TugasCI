<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;
use App\Models\ModelSouvenir;
use App\Models\ModelJual;
use CodeIgniter\Controller;

class CTransaksi extends Controller
{
    protected $ModelTransaksi;
    protected $ModelSouvenir;
    protected $ModelJual;
    protected $session;

    public function __construct()
    {
        $this->ModelTransaksi = new ModelTransaksi();
        $this->ModelSouvenir = new ModelSouvenir();
        $this->ModelJual = new ModelJual();
        $this->session = \Config\Services::session();
    }

    public function create()
    {
        $cart = $this->session->get('cart') ?? [];
        return view('v_checkout', ['cart' => $cart]);
    }

    public function checkout()
    {
        $cart = $this->session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/souvenir/cart')->with('error', 'Your cart is empty');
        }

        $dataTransaksi = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        ];

        // Simpan data transaksi di session
        $this->session->set('data_transaksi', $dataTransaksi);

        return redirect()->to('/transaksi/confirm');
    }

    public function submitOrder()
    {
        // Ambil data transaksi dan detail dari session
        $dataTransaksi = $this->session->get('data_transaksi');
        $cart = $this->session->get('cart');

        if (!$dataTransaksi || empty($cart)) {
            return redirect()->to('/souvenir/cart')->with('error', 'Transaction data or cart not found');
        }

        // Proses simpan transaksi dan detail ke database
        $db = \Config\Database::connect();
        $db->transStart();

        // Insert transaction data
        $this->ModelTransaksi->insert($dataTransaksi);
        $idTransaksi = $this->ModelTransaksi->getInsertID();

        // Process cart items
        foreach ($cart as $item) {
            $dataDetailJual = [
                'idtransaksi' => $idTransaksi,
                'idsouvenir' => $item['id'], // Assuming 'id' is the ID of souvenir in ModelSouvenir
                'harga' => $item['price'],
                'jumlah' => $item['quantity']
            ];
            $this->ModelJual->insert($dataDetailJual);

            // Update stock of souvenir
            $souvenir = $this->ModelSouvenir->find($item['id']);
            if ($souvenir) {
                $newStock = $souvenir['stok'] - $item['quantity'];
                $this->ModelSouvenir->update($item['id'], ['stok' => $newStock]);
            }
        }

        $db->transComplete();
        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('errors', $this->ModelTransaksi->errors());
        }

        // Hapus session keranjang belanja dan data transaksi setelah transaksi selesai
        $this->session->remove('cart');
        $this->session->remove('data_transaksi');

        return redirect()->to('/souvenir/pesananSelesai');
    }

    public function confirm()
    {
        $dataTransaksi = $this->session->get('data_transaksi');
        return view('v_confirm', ['dataTransaksi' => $dataTransaksi]);
    }
}
