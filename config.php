<?php
$host = 'localhost';
$dbname = 'ThesisManagementDB';
$username = 'root';  // Thay thế với tên người dùng MySQL của bạn
$password = '';      // Thay thế với mật khẩu MySQL của bạn

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>
