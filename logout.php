<?php
session_start();
unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);
setcookie('remember', null, -1);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: index.php');