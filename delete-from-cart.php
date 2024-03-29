<?php
session_start();
if(empty($_GET['id']))
{
    header('Location: index.php');
}
$id = $_GET['id'];
$productName = $_SESSION['cart'][$id]['name'];

if (empty($_SESSION['cart'][$id])) {
    header('Location: index.php');
} else {
    $_SESSION['success'] = "Xoá thành công sản phẩm \"$productName\" khỏi giỏ hàng!";
    unset($_SESSION['cart'][$id]);
    header('Location: cart.php');
}