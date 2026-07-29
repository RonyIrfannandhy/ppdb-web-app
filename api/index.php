<?php
// Tampilkan error jika ada bug di PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ubah direktori kerja ke root folder
chdir(__DIR__ . '/..');

// Jalankan file index utama
if (file_exists('index.php')) {
    require_once 'index.php';
} else {
    echo "<h3>File index.php tidak ditemukan di root folder repository.</h3>";
}
?>