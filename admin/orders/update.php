<?php
require_once '../check-admin.php';
require_once '../../config.php';
require_once '../../connection.php';
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    header('location: index.php');
    exit;
}
$id = addslashes($_GET['id']);
$status = addslashes($_GET['status']);
switch ($status) {
    case -1:
    case 0:
    case 1:
    case 2:
        $sql = "SELECT * FROM orders WHERE order_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $order = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 1) {
            $_SESSION['error'] = 'Đơn hàng không tồn tại';
            header('location: index.php');
            exit;
        }
        if ($order['status'] == -1 || $order['status'] == 2) {
            if ($order['status'] == -1) {
                $_SESSION['error'] = 'Đơn hàng này đã bị huỷ, không thể thay đổi trạng thái';
            } else if ($order['status'] == 2) {
                $_SESSION['error'] = 'Đơn hàng này đã hoàn thành, không thể thay đổi trạng thái';
            }
            header('location: index.php');
            exit;
        }
        $sql = "UPDATE orders SET status = '$status' WHERE order_id = '$id'";
        break;
    default:
        $_SESSION['error'] = 'Trạng thái không hợp lệ';
        header('location: index.php');
        exit;
}
mysqli_query($conn, $sql);
$_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công';
header('location: index.php');