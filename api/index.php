<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load index.php dari root folder
$rootIndex = __DIR__ . '/../index.php';

if (file_exists($rootIndex)) {
    require $rootIndex;
} else {
    echo "File index.php di root folder tidak ditemukan.";
}
?>