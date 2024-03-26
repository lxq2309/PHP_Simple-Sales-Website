<?php
require_once 'config.php';
require_once 'connection.php';

if (empty ($_POST['email']) || empty ($_POST['password'])) {
    header('Location: register.php?error=Vui lòng nhập đầy đủ thông tin');
    exit;
}

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

// login
$sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 1) {
    header('Location: login.php?error=Tài khoản hoặc mật khẩu không chính xác');
    exit;
} else {
    $customer = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['customer_id'] = $customer['customer_id'];
    $_SESSION['customer_name'] = $customer['name'];
    header('Location: index.php?success=Đăng nhập thành công!');
    exit;
}
