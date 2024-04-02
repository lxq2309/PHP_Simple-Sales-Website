<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        .main {
            position: relative;
            height: 100vh;
        }

        .register {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid black;
            padding: 50px 300px;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="register">
            <h2>
                Đăng nhập
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
</body>

</html>