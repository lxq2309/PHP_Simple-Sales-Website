<?php
require_once '../../config.php';
require_once '../../connection.php';
session_start();
if(empty($_POST['email']) || empty($_POST['password']))
{
    $_SESSION['error'] = 'Vui lòng nhập đủ thông tin đăng nhập';
    header('Location: login.php');
    exit;
}
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);
$sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1)
{
    $admin = mysqli_fetch_assoc($result);
    $_SESSION['admin_id'] = $admin['admin_id'];
    $_SESSION['admin_name'] = $admin['name'];
    $_SESSION['level'] = $admin['level'];
    header('Location: index.php');
    exit;
}
else
{
    $_SESSION['error'] = 'Thông tin đăng nhập không chính xác';
    header('Location: login.php');
    exit;
}