<?php
// File: config.php

// Thông số kết nối mặc định của XAMPP
$servername = "localhost";
$username = "root";
$password = ""; // Mặc định XAMPP là rỗng (không có pass)
$dbname = "student_cms"; // Tên database bạn đã tạo trong phpMyAdmin

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập font chữ tiếng Việt (tránh lỗi font)
mysqli_set_charset($conn, 'UTF8');
?>