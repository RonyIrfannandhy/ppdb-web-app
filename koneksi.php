<?php
// Mengambil kredensial dari Environment Variables Vercel
// Jika variabel belum diisi, akan otomatis fallback ke data yang ditulis di sini
$host     = getenv('DB_HOST') ?: 'host_mysql_cloud_anda.com';
$user     = getenv('DB_USER') ?: 'username_db_cloud';
$password = getenv('DB_PASS') ?: 'password_db_cloud';
$database = getenv('DB_NAME') ?: 'db_psb';
$port     = getenv('DB_PORT') ?: 3306;

// Nonaktifkan laporan error fatal bawaan agar PHP tidak langsung meluncurkan Error 500
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($host, $user, $password, $database, (int)$port);

if (!$conn) {
    // Menampilkan pesan error yang rapi alih-alih crash Function Invocation Failed
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}
?>