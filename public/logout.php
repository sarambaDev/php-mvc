<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$auth = new AuthController();
$auth->logout();
