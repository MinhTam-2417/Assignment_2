<?php

$host = 'localhost'; // Máy chủ
$dbname = 'dblab5'; // Tên cơ sở dữ liệu
$username = 'root'; // Tên người dùng
$password = ''; // Mật khẩu

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Lỗi kết nối' . $e->getMessage();
}