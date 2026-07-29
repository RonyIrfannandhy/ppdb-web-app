<?php
// Tampilkan error jika ada masalah di halaman web
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Pindah ke direktori root agar semua require/include gambar, CSS, & koneksi.php berjalan normal
chdir(__DIR__ . '/..');

// Panggil file index utama PPDB kamu
if (file_exists('index.php')) {
    require 'index.php';
} else {
    echo "File index.php utama tidak ditemukan di root folder.";
}
?>