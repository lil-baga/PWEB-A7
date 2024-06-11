<?php
include_once 'function/main.php';
include_once 'config/static.php';
include_once 'models/User.php';

class AuthController {
    static function login() {
        view('Auth/layout', ['url' => 'login', 'title' => 'Login']);
    }

    static function register() {
        view('Auth/layout', ['url' => 'register', 'title' => 'Register']);
    }
    
    static function sessionLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'username' => $post['username'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            $_SESSION['status'] = 'Anda Berhasil Login!';
            header('Location: '.BASEURL.'landing');
        }
        else {
            $_SESSION['status'] = 'Login Gagal, Coba Lagi!';
            header('Location: '.BASEURL.'login');
        }
    }

    static function newRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $register = User::register([
            'username' => $post['username'], 
            'nama' => $post['nama'], 
            'password' => $post['password']
        ]);

        if ($register) {
            $_SESSION['status'] = 'Anda Berhasil Membuat Akun TU!';
            header('Location: '.BASEURL.'dashboard');
        }
        else {
            $_SESSION['status'] = 'Register Gagal, Coba Lagi!';
            header('Location: '.BASEURL.'register');
        }
    }

    static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        $_SESSION['status'] = 'Anda Berhasil Logout!';
        header('Location: '.BASEURL);
    }
}