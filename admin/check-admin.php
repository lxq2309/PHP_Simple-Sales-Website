<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['level'])) {
    header('location: ../root/login.php');
    exit;
}