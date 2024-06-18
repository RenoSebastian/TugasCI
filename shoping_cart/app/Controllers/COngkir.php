<?php

namespace App\Controllers;

use App\Models\ModelOngkir;
use App\Models\ModelSouvenir;
use CodeIgniter\Controller;

class COngkir extends Controller
{
    protected $ModelOngkir;
    protected $ModelSouvenir;
    protected $session;

    public function __construct()
    {
        $this->ModelOngkir = new ModelOngkir();
        $this->ModelSouvenir = new ModelSouvenir();
        $this->session = \Config\Services::session();
    }

    public function checkout()
    {
        $cart = $this->session->get('cart') ?? [];
        $totalWeight = 0;
        $totalPrice = 0;

        // Calculate total weight and total price
        foreach ($cart as $item) {
            $product = $this->ModelSouvenir->find($item['id']);
            $totalWeight += $item['quantity'] * $product['berat'];
            $totalPrice += $item['quantity'] * $item['price'];
        }

        // Calculate shipping cost based on total weight
        $ongkir = $this->calculateShippingCost($totalWeight);

        // Calculate grand total
        $grandTotal = $totalPrice + $ongkir;

        // Load data ongkirs from ModelOngkir
        $ongkirs = $this->ModelOngkir->findAll(); // Adjust this based on your model method to fetch ongkirs

        // Pass data to view
        return view('v_checkout_souvenir', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'ongkir' => $ongkir,
            'grandTotal' => $grandTotal,
            'ongkirs' => $ongkirs, // Pass ongkirs data to the view
            'totalWeight' => $totalWeight, // Add total weight here
        ]);
    }

    private function calculateShippingCost($weight)
    {
        // Load shipping rates based on origin and destination postal codes
        $ongkir = $this->ModelOngkir->where('kodepos_asal', 'your_origin_postal_code')
                                   ->where('kode_pos_tujuan', 'your_destination_postal_code')
                                   ->first();

        // If no shipping rate found, handle appropriately (e.g., return default rate or show error)
        if (!$ongkir) {
            return 0; // Return default or handle error
        }

        // Calculate shipping cost based on weight and rate per kg
        // Assuming the rate is per kg
        $shippingCost = ceil($weight / 1000) * $ongkir['ongkir_per_kg']; // Convert gram to kg

        return $shippingCost;
    }

    public function submitOrder()
    {
        // Ambil data cart dari session
        $cart = $this->session->get('cart') ?? [];

        // Memulai transaksi database
        $db = \Config\Database::connect();
        $db->transStart(); // Memulai transaksi

        try {
            // Loop untuk mengurangi stok dan memasukkan pesanan ke dalam database
            foreach ($cart as $item) {
                // Ambil produk dari database berdasarkan ID
                $product = $this->ModelSouvenir->find($item['id']);

                // Periksa apakah stok mencukupi
                if ($product['stok'] < $item['quantity']) {
                    throw new \Exception('Insufficient stock for item: ' . $product['namasouvenir']);
                }

                // Kurangi stok dari produk
                $newStock = $product['stok'] - $item['quantity'];
                $this->ModelSouvenir->update($item['id'], ['stok' => $newStock]);

                // Insert order details into your orders table (simplified example)
                // $this->ModelOrder->insert([
                //     'id_souvenir' => $item['id'],
                //     'quantity' => $item['quantity'],
                //     'total_price' => $item['quantity'] * $item['price'],
                //     'shipping_cost' => $this->calculateShippingCost($item['weight']),
                //     'user_id' => $user_id, // Adjust this based on your user session handling
                // ]);
            }

            // Akhiri transaksi database
            $db->transComplete();

            // Clear cart session after successful order submission
            $this->session->remove('cart');

            // Redirect to order completion page
            return redirect()->to('/souvenir/pesananSelesai');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $db->transRollback();

            // Handle error (e.g., show error message)
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function pesananSelesai()
    {
        // Tampilkan halaman v_pesanan_selesai
        return view('v_pesanan_selesai');
    }
}

