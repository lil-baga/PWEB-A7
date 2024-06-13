<?php
include_once 'function/main.php';
include_once 'config/static.php';
include_once 'models/User.php';

class AuthController {
    static function login() {
        view('Auth/layout', ['url' => 'login', 'title' => 'Login']);
    }

    static function register() {
        if ($_SESSION['user']['id'] != 1) {
            $_SESSION['status'] = 'Anda Dilarang Mengakses Kecuali Admin!';
            header('Location: ' . BASEURL);
            exit;
        } 
        else{
            view('Auth/layout', ['url' => 'register', 'title' => 'Register']);
        }
    }
    
    static function sessionLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        if ( empty( $post[ 'username' ] ) || empty( $post[ 'password' ] )) {
            $_SESSION['status'] = 'Username dan Password Wajib Diisi!';
            header('Location: '.BASEURL.'login');
        }

        else {
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
                $_SESSION['status'] = 'Username atau Password Salah!';
                header('Location: '.BASEURL.'login');
            }
        }
    }

    static function newRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        if ( empty( $post[ 'username' ] ) || empty( $post[ 'nama' ] ) || empty( $post[ 'password' ] )) {
            $_SESSION['status'] = 'Username, Nama, dan Password Wajib Diisi!';
            header('Location: '.BASEURL.'register');
        }

        elseif ( strlen( $post[ 'username' ] ) != 9 ) {
            $_SESSION['status'] = 'Username Harus Merupakan NRP';
            header('Location: '.BASEURL.'register');
        }

        elseif ( strlen( $post[ 'password' ] ) < 8 ) {
            $_SESSION['status'] = 'Password Minimal Terdiri dari 8 Karakter';
            header('Location: '.BASEURL.'register');
        }

        else {
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

        $_SESSION['status'] = 'Anda Berhasil Logout!';
        session_destroy();
        header('Location: '.BASEURL);
    }
}