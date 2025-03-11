<?php
session_start();
include('config.php');

// Kiểm tra đăng nhập
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Kiểm tra người dùng
    $stmt = $pdo->prepare("SELECT * FROM SinhVien WHERE email = :email AND password = :password");
    $stmt->execute(['email' => $email, 'password' => md5($password)]);
    $user = $stmt->fetch();
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = 'student';
        header("Location: dashboard.php");
    } else {
        echo "Thông tin đăng nhập không hợp lệ!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
