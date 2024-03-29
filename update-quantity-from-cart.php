<?php
session_start();
if (empty($_GET['id']) || empty($_GET['type'])) {
    header('Location: index.php');
}
$id = $_GET['id'];
$productName = $_SESSION['cart'][$id]['name'];
$type = $_GET['type'];

switch ($type) {
    case 'inc':
        $_SESSION['cart'][$id]['quantity']++;
        $_SESSION['success'] = "Tăng số lượng \"$productName\" thành công!";
        break;

    case 'dec':
        $_SESSION['cart'][$id]['quantity']--;
        if ($_SESSION['cart'][$id]['quantity'] == 0) {
            header("location: delete-from-cart.php?id=$id");
            exit;
        }
        $_SESSION['success'] = "Giảm số lượng \"$productName\" thành công!";
        break;
}

header('location: cart.php');