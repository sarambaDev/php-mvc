<?php

require_once __DIR__ . '/app/config/config.php';
if (!isset($_SESSION['user'])) {
    header("Location: public/login.php");
    exit;
} else {
    header("Location: public/index.php?view=dashboard");
    exit;
}
