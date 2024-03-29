<?php
require_once '../../config.php';
require_once '../../connection.php';

session_start();

if (empty ($_POST['product_id'])) {
    header("Location: index.php");
    exit;
}
$id = $_POST['product_id'];
// validate
if (empty ($_POST['name']) || empty ($_POST['description']) || empty ($_POST['price'])) {
    $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
    header("Location: edit.php?id=$id");
    exit;
}

$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$price = addslashes($_POST['price']);
$old_image = addslashes($_POST['old_image']);
$new_image = $_FILES['new_image'];
$manufacturer_id = addslashes($_POST['manufacturer_id']);

// upload file
if ($new_image['size'] > 0) {
    $target_dir = "/images/products/";
    $target_file = $target_dir . time() . basename($new_image["name"]);
    move_uploaded_file($new_image["tmp_name"], '../..' . $target_file);
} else {
    $target_file = $old_image;
}




// update
$sql = "UPDATE products SET
            name = '$name',
            description = '$description',
            price = '$price',
            image = '$target_file',
            manufacturer_id = '$manufacturer_id'
        WHERE product_id = '$id'
";

try {
    mysqli_query($conn, $sql);
} catch (\Throwable $th) {
    $_SESSION['error'] = 'Lỗi hệ thống';
    header("Location: edit.php?id=$id");
    exit;
}
$_SESSION['success'] = 'Sửa thành công';
header("Location: edit.php?id=$id");
