<?php
require_once '../../config.php';
require_once '../../connection.php';

if (empty ($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$id = $_GET['id'];
// delete
$sql = "DELETE FROM products
        WHERE product_id = '$id'
";
mysqli_query($conn, $sql);
header('Location: index.php?success=Xoá thành công');