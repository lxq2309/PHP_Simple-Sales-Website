<?php
require_once 'config.php';
require_once 'connection.php';
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
            <h1><a href="<?php echo $WEB_URL ?>">SALES WEBSITE</a></h1>
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
                    <a class="<?php echo ($currentAction == "cart" ? "active" : '') ?>"
                        href="<?php echo $WEB_URL . '/cart.php' ?>">Giỏ hàng (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</a>
                </li>

                <?php if (!isset($_SESSION['customer_id'])) { ?>
                    <li>
                        <a class="<?php echo ($currentAction == "login" ? "active" : '') ?>"
                            href="<?php echo $WEB_URL . '/login.php' ?>">Đăng nhập</a>
                    </li>
                    <li>
                        <a class="<?php echo ($currentAction == "register" ? "active" : '') ?>"
                            href="<?php echo $WEB_URL . '/register.php' ?>">Đăng ký</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo ($currentAction == "user" ? "active" : '') ?>"
                            href="<?php echo $WEB_URL . '/user.php' . '?id=' . $_SESSION['customer_id'] ?>">
                            <?php echo $_SESSION['customer_name'] ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $WEB_URL . '/logout.php' ?>">Đăng xuất</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>