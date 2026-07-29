<?php
// Tampilkan semua error PHP ke layar agar tidak tertutup Error 500 Vercel
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cek apakah file index utama di luar folder api ada
$indexPath = __DIR__ . '/../index.php';

if (file_exists($indexPath)) {
    require_once $indexPath;
} else {
    echo "<h1>Error Entrypoint</h1>";
    echo "File <code>index.php</code> di root folder tidak ditemukan.<br>";
    echo "Lokasi yang dicari: " . htmlspecialchars($indexPath);
}
?>