<?php
require_once '../../config.php';
require_once '../../connection.php';
// validate
if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']))
{
    header('Location: create.php?error=Vui lòng nhập đầy đủ thông tin');
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image'];
$manufacturer_id = $_POST['manufacturer_id'];

// upload file
$target_dir = "img/";
$target_file = $target_dir . time() . basename($image["name"]);
move_uploaded_file($image["tmp_name"], $target_file);

// insert
$sql = "INSERT INTO products(name, description, price, image, manufacturer_id) VALUES ('$name', '$description', '$price', '$target_file', '$manufacturer_id')";
if(mysqli_query($conn, $sql))
{
    header('Location: create.php?success=Thêm thành công');
}
else
{
    header('Location: create.php?error=Lỗi hệ thống');
}