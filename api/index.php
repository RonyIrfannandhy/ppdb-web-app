<?php
// Paksa tampilkan error jika ada masalah PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ambil Environment Variables dari Vercel
$host     = getenv('DB_HOST');
$user     = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME') ?: 'test';
$port     = getenv('DB_PORT') ?: 4000;

// Test Koneksi MySQLi + SSL TiDB
$conn = mysqli_init();

if ($conn) {
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    $success = @mysqli_real_connect($conn, $host, $user, $password, $database, (int)$port, NULL, MYSQLI_CLIENT_SSL);
    
    if ($success) {
        echo "<h2 style='color:green;'>✅ KONEKSI BERHASIL KE DATABASE TIDB!</h2>";
        echo "<p>Database terhubung ke: <b>" . htmlspecialchars($database) . "</b></p>";
        
        // Memanggil file index utama jika ada
        if (file_exists(__DIR__ . '/../index.php')) {
            require_once __DIR__ . '/../index.php';
        }
    } else {
        echo "<h2 style='color:red;'>❌ GAGAL KONEKSI KE TIDB:</h2>";
        echo "<pre>" . mysqli_connect_error() . "</pre>";
    }
} else {
    echo "MySQLi Init Gagal.";
}
?>