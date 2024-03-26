<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    header('Location: index.php');
}
?>

<?php
$title = "Đăng ký";
$currentAction = "register";
require_once 'header.php';
?>


<div class="main">
    <div class="register">
        <h2>
            <?php echo $title ?>
        </h2>
        <form action="process-register.php" method="POST">
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Tên đầy đủ</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="number" name="phone_number"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><textarea name="address" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Đăng ký"></td>
                </tr>
            </table>
            <?php if (isset ($_GET['error'])) { ?>
                <div style="color: red; text-align: center">
                    <?php echo $_GET['error'] ?>
                </div>
            <?php } ?>
        </form>
    </div>
</div>

<?php
require_once 'footer.php';
?>