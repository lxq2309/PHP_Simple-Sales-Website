<?php
require_once 'config.php';
require_once 'connection.php';
session_start();
if (empty($_SESSION['customer_id'])) {
    $_SESSION['error'] = 'Đăng nhập để tiếp tục';
    header('Location: login.php');
    exit;
}

if (empty($_POST['name_receiver']) || empty($_POST['phone_receiver']) || empty($_POST['address_receiver'])) {
    $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
    header('Location: checkout.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];
$status = 0;
$total_price = 0;
foreach ($_SESSION['cart'] as $id => $each) {
    $total_price += $each['quantity'] * $each['price'];
}

// Thêm bản ghi vào bảng orders
$sql = "INSERT INTO orders(customer_id, name_receiver, phone_receiver, address_receiver, status, total_price) 
                    VALUES ('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$status', '$total_price')";
mysqli_query($conn, $sql);

// Lấy ra order_id của bản ghi vừa thêm
$sql = "SELECT max(order_id) FROM orders WHERE customer_id = '$customer_id'";
$result = mysqli_query($conn, $sql);
$order_id = mysqli_fetch_column($result);

// Thêm từng bản ghi vào bảng order_product (chi tiết hoá đơn)
foreach ($_SESSION['cart'] as $product_id => $each) {
    $quantity = $each['quantity'];
    $sql = "INSERT INTO order_product(order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
    mysqli_query($conn, $sql);
}

// Xoá giỏ hàng
unset($_SESSION['cart']);

// Redirect về trang xem giỏ hàng
$_SESSION['success'] = 'Đặt hàng thành công';
header('location: cart.php');