<?php
session_start();
unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);
header('Location: index.php?success=Đăng xuất thành công');