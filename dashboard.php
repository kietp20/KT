<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng
$stmt = $pdo->prepare("SELECT * FROM SinhVien WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

// Lấy thông tin giảng viên hướng dẫn
$stmt = $pdo->prepare("SELECT * FROM GiangVien WHERE id = :advisor_id");
$stmt->execute(['advisor_id' => $user['assigned_advisor']]);
$advisor = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Chào mừng, <?php echo $user['name']; ?></h2>
        <h3>Giảng viên hướng dẫn của bạn: <?php echo $advisor ? $advisor['name'] : 'Chưa có giảng viên hướng dẫn'; ?></h3>
        <a href="logout.php">Đăng xuất</a>
    </div>
</body>
</html>

