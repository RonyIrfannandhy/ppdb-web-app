<?php
$host     = getenv('DB_HOST');
$user     = getenv('DB_USER');
$password = getenv('DB_PASS');
$database = getenv('DB_NAME') ?: 'test';
$port     = getenv('DB_PORT') ?: 4000;

mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($host, $user, $password, $database, (int)$port);

if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>