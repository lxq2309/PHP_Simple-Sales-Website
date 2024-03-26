<?php
session_start();
if (isset($_SESSION['customer_id'])) {
    header('Location: index.php');
}
?>
<?php
$title = "Đăng nhập";
$currentAction = "login";
require_once 'header.php';
?>

<div class="main">
    <div class="register">
        <h2>
            <?php echo $title ?>
        </h2>
        <form action="process-login.php" method="POST">
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
                    <td></td>
                    <td><input type="submit" value="Đăng nhập"></td>
                </tr>
            </table>
            <?php if (isset ($_GET['error'])) { ?>
                <div style="color: red; text-align: center">
                    <?php echo $_GET['error'] ?>
                </div>
            <?php } ?>
            <?php if (isset ($_GET['success'])) { ?>
                <div style="color: green; text-align: center">
                    <?php echo $_GET['success'] ?>
                </div>
            <?php } ?>
        </form>
    </div>
</div>

<?php
require_once 'footer.php';
?>