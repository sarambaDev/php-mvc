<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Konfigurasi dasar
// 1. Tentukan protokol (http vs https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443
    ? 'https://'
    : 'http://';

// 2. Ambil host (domain + port jika ada)
$host = $_SERVER['HTTP_HOST'];

// 3. Cari path ke folder public
//    misal index.php berada di /contoh/public/index.php
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
// hasilnya "/contoh/public"

// 4. Gabungkan jadi base_url
$base_url = $protocol . $host . $scriptDir . '/';

// contoh output:
// https://example.com/contoh/public/
// http://localhost/contoh/public/

// Konfigurasi database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'mikrotik';

// Koneksi database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
