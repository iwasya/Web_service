<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
<<<<<<< HEAD

// Menampilkan daftar barang
$routes->get('/items', 'Items::index');


// Form tambah barang
$routes->get('/items/create', 'Items::create');

// Proses penyimpanan barang baru
$routes->post('/items/store', 'Items::store');

// Form edit barang berdasarkan ID
$routes->get('/items/edit/(:segment)', 'Items::edit/$1');

// Proses update barang berdasarkan ID
$routes->post('/items/update/(:segment)', 'Items::update/$1');

// Hapus barang berdasarkan ID
$routes->get('/items/delete/(:segment)', 'Items::delete/$1');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');
=======
>>>>>>> af465f6e1bd31ea6cd031ade51accd398ad97538
