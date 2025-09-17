<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/EmployeeController.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// Tentukan halaman yang diminta
$page = isset($_GET['view']) ? $_GET['view'] : 'dashboard';

// Include template header
include '../app/views/templates/header.php';
include '../app/views/templates/sidebar.php';

// Load halaman konten
$file = "../app/views/pages/{$page}.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "<h1>404 - Halaman tidak ditemukan</h1>";
}

// Include footer
include '../app/views/templates/footer.php';
