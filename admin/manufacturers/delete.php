<?php
require_once '../../config.php';
require_once '../../connection.php';

if (empty ($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];
// delete
$sql = "DELETE FROM manufacturers
        WHERE manufacturer_id = '$id'
";
mysqli_query($conn, $sql);
session_start();
$_SESSION['success'] = "Xoá thành công";
header('Location: index.php');