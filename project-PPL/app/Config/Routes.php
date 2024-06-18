<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */

$routes->get('souvenir', 'CSouvenir::index');

$routes->post('souvenir/addToCart/(:num)', 'CSouvenir::addToCart/$1');
$routes->get('souvenir/cart', 'CSouvenir::viewCart');
$routes->get('souvenir/removeItem/(:num)', 'CSouvenir::removeItem/$1');
$routes->get('souvenir/clearCart', 'CSouvenir::clearCart');
$routes->get('souvenir/category/(:any)', 'CSouvenir::filterByCategory/$1');
$routes->post('souvenir/search', 'CSouvenir::search');


// $routes->get('/ini', 'Home::display');
$routes->get('/barang', 'ControllerBarang::index');
$routes->get('/barang/delete/(:any)', 'ControllerBarang::delete/$1');
$routes->post('/barang/search', 'ControllerBarang::search');
 // Route untuk menampilkan form insert barang

$routes->get('/barang/update/(:any)', 'ControllerBarang::showUpdateForm/$1');
$routes->post('/barang/update', 'ControllerBarang::update');

$routes->get('/', function() {
    return view ('v_template');
});

$routes->get('/info', 'CInfo::display');
$routes->get('/home', 'CHome::display');
$routes->get('/Tbarang', 'CTemplateBarang::display');
$routes->post('/Tbarang/search', 'CTemplateBarang::search'); 
$routes->get('/Tbarang/detail/(:any)', 'CTemplateBarang::detail/$1');
$routes->get('/barang/insert', 'CTemplateBarang::showInsertForm');
$routes->post('/barang/insert', 'CTemplateBarang::insert');


//Validation

// app/Config/Routes.php

$routes->get('/form', 'CValidation::index');
$routes->post('/form/submit', 'CValidation::submit');

//login


$routes->get('/login', 'CLogin::index'); // Rute untuk menampilkan halaman login
$routes->post('/authlogin', 'CLogin::login'); // Rute untuk proses login
$routes->post('/logout', 'CLogin::logout');
// Tambahkan rute lainnya sesuai kebutuhan

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', function() {
        return view ('v_template');
    });
    
    $routes->get('/info', 'CInfo::display');
    $routes->get('/home', 'CHome::display');
    $routes->get('/Tbarang', 'CTemplateBarang::display');
    $routes->post('/Tbarang/search', 'CTemplateBarang::search'); 
    $routes->get('/Tbarang/detail/(:any)', 'CTemplateBarang::detail/$1');
    $routes->get('/barang/insert', 'CTemplateBarang::showInsertForm');
    $routes->post('/barang/insert', 'CTemplateBarang::insert');
    
});

