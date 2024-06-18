<?php

namespace App\Controllers;

use App\Models\ModelSouvenir;
use CodeIgniter\Session\Session;
use CodeIgniter\Controller;

class CSouvenir extends Controller
{
    protected $ModelSouvenir;
    protected $session;

    public function __construct()
    {
        $this->ModelSouvenir = new ModelSouvenir();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data['souvenir'] = $this->ModelSouvenir->findAll();
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
        return redirect()->to('/cart');
    }

    public function viewCart()
    {
        $session = session();
        $cart = $this->session->get('cart') ?? [];
        return view('v_cart', ['cart' => $cart]);
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

    public function search()
    {
        $keyword = $this->request->getPost('keyword');

        // Split keyword into separate words
        $keywords = explode(" ", $keyword);

        // Initialize variable for category
        $category = '';

        // Check if keyword contains category
        foreach ($keywords as $word) {
            if (strtolower($word) == 'souvenir' || strtolower($word) == 'toy' || strtolower($word) == 'mainan') {
                $category = $word;
                // Remove category from keyword list
                $keywords = array_diff($keywords, [$word]);
                break; // Exit loop once category is found
            }
        }

        // Reconstruct keyword after removing category
        $keyword = implode(" ", $keywords);

        // Build query based on keyword
        $builder = $this->ModelSouvenir->builder();

        if (!empty($keyword)) {
            $builder->like('namasouvenir', $keyword)
                    ->orLike('kategori', $keyword);
        }

        $data['souvenirs'] = $builder->get()->getResultArray();
        return view('v_katalog_souvenir', $data);
    }
}