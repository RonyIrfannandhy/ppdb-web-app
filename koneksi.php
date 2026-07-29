<?php
// Ambil variabel dari Vercel Environment Variables
$host     = getenv('DB_HOST');
$user     = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME') ?: 'test';
$port     = getenv('DB_PORT') ?: 4000;

// Inisialisasi koneksi MySQLi
$conn = mysqli_init();

if ($conn) {
    // Mengaktifkan SSL/TLS agar diterima oleh TiDB Cloud
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    
    // Melakukan koneksi dengan timeout 10 detik
    @mysqli_real_connect($conn, $host, $user, $password, $database, (int)$port, NULL, MYSQLI_CLIENT_SSL);
}

// Jika koneksi gagal, tampilkan pesan error yang jelas (bukan crash 500)
if (mysqli_connect_errno()) {
    die("Gagal terhubung ke Database TiDB: " . mysqli_connect_error());
}
?>