<?php
require_once '../../config.php';
require_once '../../connection.php';
require_once '../check-admin.php';
require_once '../check-super-admin.php';
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title ?>
    </title>
    <?php require_once 'style.php' ?>
</head>

<body>
    <div class="header">
        <div class="left">
            <h1><a href="<?php echo $ADMIN_URL . '/root' ?>">Admin Panel</a></h1>
            <div>Xin chào, <strong>
                    <?php echo $_SESSION['admin_name'] ?>
                </strong>
                (
                <?php
                switch ($_SESSION['level']) {
                    case 0:
                        echo 'Admin';
                        break;
                    case 1:
                    default:
                        echo 'Super Admin';
                        break;
                }
                ?>)
            </div>
            <br>
        </div>
        <div class="right">
            <ul>
                <li><a href="<?php echo $WEB_URL . '/' ?>">Về trang khách</a></li>
                <li><a href="../root/logout.php">Đăng xuất</a></li>
            </ul>
        </div>

    </div>
    <div class="sidebar">
        <ul>
            <li><a class="<?php echo ($currentFolder == "root" ? "active" : '') ?>"
                    href="<?php echo $ADMIN_URL . '/root' ?>">Trang chủ</a></li>
            <?php if ($level > 0) { ?>
                <li><a class="<?php echo ($currentFolder == "manufactures" ? "active" : '') ?>"
                        href="<?php echo $ADMIN_URL . '/manufacturers' ?>">Nhà sản xuất</a></li>
            <?php } ?>
            <li><a class="<?php echo ($currentFolder == "products" ? "active" : '') ?>"
                    href="<?php echo $ADMIN_URL . '/products' ?>">Sản phẩm</a></li>
            <li><a class="<?php echo ($currentFolder == "customers" ? "active" : '') ?>"
                    href="<?php echo $ADMIN_URL . '/customers' ?>">Khách hàng</a></li>
            <?php if ($level > 0) { ?>
                <li><a class="<?php echo ($currentFolder == "admins" ? "active" : '') ?>"
                        href="<?php echo $ADMIN_URL . '/admins' ?>">Nhân viên</a></li>
            <?php } ?>
        </ul>
    </div>