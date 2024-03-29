<?php
require_once 'config.php';
require_once 'connection.php';
session_start();
if (isset($_COOKIE['remember'])) {
    $token = addslashes($_COOKIE['remember']);
    $sql = "SELECT * FROM customers WHERE token = '$token'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $customer = mysqli_fetch_assoc($result);
        $_SESSION['customer_id'] = $customer['customer_id'];
        $_SESSION['customer_name'] = $customer['name'];
    }
}

if (isset($_SESSION['customer_id'])) {
    header('Location: index.php');
    exit;
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
                    <td><input type="checkbox" name="remember" style="width: 10px"> Ghi nhớ tôi</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Đăng nhập"></td>
                </tr>
            </table>
            <?php if (isset($_SESSION['error'])) { ?>
                <div style="color: red; text-align: center">
                    <?php echo $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div style="color: green; text-align: center">
                    <?php echo $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php } ?>
        </form>
    </div>
</div>

<?php
require_once 'footer.php';
?>