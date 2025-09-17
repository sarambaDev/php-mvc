<?php
class AuthController
{
    // Tampilkan form login
    public function loginForm()
    {
        include __DIR__ . '/../views/pages/login_form.php';
    }

    // Proses login
    public function login($conn)
    {
        $u = $_POST['username'] ?? '';
        $p = $_POST['password'] ?? '';

        $stmt = $conn->prepare(
            "SELECT id, username, password FROM users WHERE username=? LIMIT 1"
        );
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($p, $user['password'])) {
            $_SESSION['user'] = [
                'id'       => $user['id'],
                'username' => $user['username']
            ];
            header("Location: index.php");
            exit;
        }

        $_SESSION['error'] = "Username atau password salah";
        header("Location: login.php");
        exit;
    }

    // Logout
    public function logout()
    {
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
