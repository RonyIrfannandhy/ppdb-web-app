<?php
$host     = getenv('DB_HOST');
$user     = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME') ?: 'sys';
$port     = getenv('DB_PORT') ?: 4000;

$conn = mysqli_init();

if ($conn) {
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    @mysqli_real_connect($conn, $host, $user, $password, $database, (int)$port, NULL, MYSQLI_CLIENT_SSL);
}

if (mysqli_connect_errno()) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>