<?php

// Load CodeIgniter's bootstrap file
require '../vendor/autoload.php';

use CodeIgniter\Database\Config;

$db = Config::connect();

if ($db->connID->ping()) {
    echo 'Koneksi ke database berhasil!';
} else {
    echo 'Gagal terhubung ke database.';
}