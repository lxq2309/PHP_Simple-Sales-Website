<?php
require_once '../../config.php';
require_once '../../connection.php';

if (empty ($_POST['product_id'])) {
    header("Location: index.php");
    exit;
}
$id = $_POST['product_id'];
// validate
if (empty ($_POST['name']) || empty ($_POST['description']) || empty ($_POST['price'])) {
    header("Location: edit.php?id=$id&error=Vui lòng nhập đầy đủ thông tin");
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$old_image = $_POST['old_image'];
$new_image = $_FILES['new_image'];
$manufacturer_id = $_POST['manufacturer_id'];

// upload file
if ($new_image['size'] > 0) {
    $target_dir = "img/";
    $target_file = $target_dir . time() . basename($new_image["name"]);
    move_uploaded_file($new_image["tmp_name"], $target_file);
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
    header("Location: edit.php?id=$id&error=Lỗi hệ thống");
    exit;
}
header("Location: edit.php?id=$id&success=Sửa thành công");
