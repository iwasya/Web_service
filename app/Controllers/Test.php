<?php

// app/Controllers/Test.php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Test extends Controller
{
public function index()
{
$db = Database::connect();

try {
$db->simpleQuery('SELECT 1'); // Query sederhana untuk cek koneksi
echo 'Koneksi ke database berhasil!';
} catch (\Exception $e) {
echo 'Gagal terhubung ke database: ' . $e->getMessage();
}
}
}