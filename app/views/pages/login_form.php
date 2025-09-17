<?php
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
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>assets/dist/css/adminlte.min.css">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silakan Login</p>

                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

            </div>
        </div>
    </div>
    <script src="<?= $base_url ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base_url ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>