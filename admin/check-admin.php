<?php
session_start();
if (!isset($_SESSION['level'])) {
    header('location: ../root/login.php');
    exit;
}