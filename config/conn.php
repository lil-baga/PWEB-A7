<?php
require_once 'env.php';

$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

global $conn;
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}