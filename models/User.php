<?php
include_once 'config/conn.php';

class User {
    static function login($data = [])
    {
        global $conn;
    
        $username = $data['username'];
        $password = $data['password'];
    
        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                return $result;
            } else {
                return false;
            }
        }
    }
    
    static function register($data = [])
    {
        global $conn;

        $username = $data['username'];
        $nama = $data['nama'];
        $password = $data['password'];
        $roles_id = 2;

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET username = ?, nama = ?, password = ?, roles_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $username, $nama, $hashedPassword, $roles_id);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
}