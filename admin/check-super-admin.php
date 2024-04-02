<?php
$currentPath = getcwd();
$isNotAllowed = false;
if (str_contains($currentPath, 'manufacturers')) {
    $isNotAllowed = true;
}
if ($_SESSION['level'] < 1 && $isNotAllowed) {
    header('location: ../root/index.php');
    exit;
}