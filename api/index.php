<?php
// Memanggil file index utama dari luar folder api
if (file_exists(__DIR__ . '/../index.php')) {
    require __DIR__ . '/../index.php';
} else {
    echo "File index.php utama tidak ditemukan di root folder.";
}