<?php
require_once '../../config.php';
require_once '../../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        a {
            text-decoration: none;
        }
        .header > ul > li > a.active {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="header">
    <h1><a href="<?php echo $ADMIN_URL ?>">Trang quản trị</a></h1>
    <ul>
    <li><a class="<?php echo ($currentFolder == "root" ? "active" : '') ?>" href="<?php echo $ADMIN_URL . '/' ?>">Trang chủ</a></li>
        <li><a class="<?php echo ($currentFolder == "manufactures" ? "active" : '') ?>" href="<?php echo $ADMIN_URL . '/manufacturers' ?>">Nhà sản xuất</a></li>
        <li><a class="<?php echo ($currentFolder == "products" ? "active" : '') ?>" href="<?php echo $ADMIN_URL . '/products' ?>">Sản phẩm</a></li>
    </ul>
</div>