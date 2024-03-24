<?php
require_once 'config.php';
require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $WEB_DESCRIPTION ?>">
    <title>
        <?php echo $title . ' - ' . $WEB_TITLE ?>
    </title>
    <?php require_once 'style.php' ?>
</head>

<body>
    <div class="header">
        <div class="left">
            <h1><a href="<?php echo $WEB_URL ?>">WEBSITE BÁN HÀNG</a></h1>
        </div>
        <div class="right">
            <ul>
                <li>
                    <a class="<?php echo ($currentAction == "index" ? "active" : '') ?>"
                        href="<?php echo $WEB_URL . '/' ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?php echo $ADMIN_URL . '/root' ?>">Trang quản trị</a>
                </li>
                <li>
                    <a class="<?php echo ($currentAction == "login" ? "active" : '') ?>"
                        href="<?php echo $WEB_URL . '/login.php' ?>">Đăng nhập</a>
                </li>
                <li>
                    <a class="<?php echo ($currentAction == "register" ? "active" : '') ?>"
                        href="<?php echo $WEB_URL . '/register.php' ?>">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>