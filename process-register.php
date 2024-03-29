<?php
require_once 'config.php';
require_once 'connection.php';

session_start();

if (empty ($_POST['email']) || empty ($_POST['password']) || empty ($_POST['name']) || empty ($_POST['phone_number']) || empty ($_POST['address'])) {
    $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
    header('Location: register.php');
    exit;
}

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
$name = addslashes($_POST['name']);
$phone_number = addslashes($_POST['phone_number']);
$address = addslashes($_POST['address']);

// validate
$sql = "SELECT * FROM customers WHERE email = '$email' OR phone_number = '$phone_number'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
    $customer = mysqli_fetch_assoc($result);
    $error = '';
    if ($customer['email'] == $email ) {
        $error .= 'Email đã tồn tại trong hệ thống <br>';
    }
    if ($customer['phone_number'] == $phone_number ) {
        $error .= 'Số điện thoại đã tồn tại trong hệ thống <br>';
    }
    $_SESSION['error'] = $error;
    header("Location: register.php");
    exit;
} else {
    // register
    $sql = "INSERT INTO customers(email, password, name, phone_number, address) VALUES ('$email', '$password', '$name', '$phone_number', '$address')";
    mysqli_query($conn, $sql);
    $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập bằng tài khoản vừa tạo';
    header('Location: login.php');
    exit;
}
