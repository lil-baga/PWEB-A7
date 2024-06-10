<?php
include_once 'function/main.php';
include_once 'config/static.php';
include_once 'models/User.php';

class AuthController {
    static function login() {
        view('auth/layout', ['url' => 'login']);
    }

    static function register() {
        view('auth/layout', ['url' => 'register']);
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
            header('Location: '.BASEURL.'dashboard');
        }
        else {
            header('Location: '.BASEURL.'login');
        }
    }

    // static function saveRegister() {
    //     $post = array_map('htmlspecialchars', $_POST);

    //     $user = User::register([
    //         'name' => $post['name'], 
    //         'username' => $post['username'], 
    //         'password' => $post['password']
    //     ]);

    //     if ($user) {
    //         header('Location: '.BASEURL.'login');
    //     }
    //     else {
    //         header('Location: '.BASEURL.'register?failed=true');
    //     }
    // }

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
        header('Location: '.BASEURL);
    }
}