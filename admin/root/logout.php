<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['admin_name']);
unset($_SESSION['level']);
header('location: index.php');