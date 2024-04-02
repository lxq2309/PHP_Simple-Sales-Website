<?php
session_start();
if (empty($_SESSION['admin_id']))
{
    header('Location: root/login.php');
    exit;
}
else {
    header('Location: root/index.php');
    exit;
}