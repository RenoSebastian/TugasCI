<?php

namespace App\Controllers;

use App\Models\ModelSouvenir;
use CodeIgniter\Controller;

class CSouvenir extends Controller
{
    protected $ModelSouvenir;
    protected $session;

    public function __construct()
    {
        $this->ModelSouvenir = new ModelSouvenir();
        $this->session = session();
    }

    public function index()
    {
        $data['souvenirs'] = $this->ModelSouvenir->findAll();
        return view('v_katalog_souvenir', $data);
    }
    
    public function addToCart()
    {
        $id = $this->request->getPost('idsouvenir');
        $quantity = $this->request->getPost('quantity');

        $product = $this->ModelSouvenir->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product['idsouvenir'],
                'name' => $product['namasouvenir'],
                'price' => $product['harga'],
                'quantity' => $quantity,
            ];
        }

        $this->session->set('cart', $cart);

        return redirect()->to('/souvenir/cart');
    }

    public function viewCart()
    {
        $cart = $this->session->get('cart') ?? [];
        return view('v_souvenir_cart', ['cart' => $cart]);
    }

    public function removeItem($id)
    {
        $cart = $this->session->get('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        $this->session->set('cart', $cart);
        return redirect()->to('/souvenir/cart');
    }

    public function clearCart()
    {
        $this->session->remove('cart');
        return redirect()->to('/souvenir/cart');
    }

    public function checkout()
    {
        $cart = $this->session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/souvenir/cart')->with('error', 'Your cart is empty');
        }

        // Lakukan proses checkout di sini
        // Contoh: Simpan pesanan ke database, update stok barang, dll.

        // Setelah checkout sukses, kosongkan session cart
        $this->session->remove('cart');

        return view('v_checkout_souvenir', [
            'cart' => $cart,
            'ongkirs' => [], // Tambahkan data ongkir jika diperlukan
            'totalWeight' => 0, // Ganti dengan berat total sesuai dengan logika Anda
            'totalPrice' => 0, // Ganti dengan harga total sesuai dengan logika Anda
            'ongkir' => 0, // Ganti dengan ongkir sesuai dengan logika Anda
            'grandTotal' => 0, // Ganti dengan grand total sesuai dengan logika Anda
        ]);
    }

    public function pesananSelesai()
    {
        // Tampilkan halaman v_pesanan_selesai
        return view('v_pesanan_selesai');
    }
}
