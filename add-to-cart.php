<?php
require_once 'config.php';
require_once 'connection.php';

session_start();

if (empty($_GET['id'])) {
    header('location: index.php');
    exit;
}

if (empty($_SESSION['customer_id'])) {
    $_SESSION['error'] = 'Đăng nhập để tiếp tục';
    header('Location: login.php');
    exit;
}
$id = addslashes($_GET['id']);

// Nếu sản phẩm đang thêm chưa có trong giỏ hàng
if (empty($_SESSION['cart'][$id])) {
    // Lay thong tin san pham
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        // Nếu sản phẩm tồn tại thì lấy thông tin
        $product = mysqli_fetch_assoc($result);
    } else {
        // Nếu sản phẩm không tồn tại thì redirect về trang chủ
        header('location: index.php');
        exit;
    }
    $_SESSION['cart'][$id]['quantity'] = 1;
    $_SESSION['cart'][$id]['name'] = $product['name'];
    $_SESSION['cart'][$id]['image'] = $product['image'];
    $_SESSION['cart'][$id]['price'] = $product['price'];
} else {
    // Nếu sản phẩm đang thêm đã có trong giỏ hàng
    $_SESSION['cart'][$id]['quantity']++;
}
$_SESSION['success'] = "Thêm sản phẩm vào giỏ hàng thành công !";
// Quay trở về trang trước
header('location:' . $_SERVER['HTTP_REFERER']);