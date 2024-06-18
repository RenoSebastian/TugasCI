<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes.php

// Route untuk menampilkan halaman katalog souvenir
$routes->get('/souvenir', 'CSouvenir::index');

// Route untuk menambahkan souvenir ke dalam keranjang belanja
$routes->post('/souvenir/addToCart', 'CSouvenir::addToCart');

// Route untuk menampilkan keranjang belanja
$routes->get('/souvenir/cart', 'CSouvenir::viewCart');

// Route untuk menghapus item dari keranjang belanja
$routes->get('/souvenir/removeItem/(:num)', 'CSouvenir::removeItem/$1');

// Route untuk membersihkan seluruh keranjang belanja
$routes->get('/souvenir/clearCart', 'CSouvenir::clearCart');

// Route untuk melakukan pencarian souvenir
$routes->post('/souvenir/search', 'CSouvenir::search');

// Route untuk menampilkan halaman checkout
$routes->get('/souvenir/checkout', 'COngkir::checkout');

$routes->post('/souvenir/submitOrder', 'COngkir::submitOrder');
$routes->get('/souvenir/pesananSelesai', 'COngkir::pesananSelesai');

$routes->get('/login', 'CLogin::index'); // Rute untuk menampilkan halaman login
$routes->post('/authlogin', 'CLogin::login'); // Rute untuk proses login
$routes->post('/logout', 'CLogin::logout');
$routes->post('/logout', 'CLogin::logout');

// Tambahkan rute lainnya sesuai kebutuhan

