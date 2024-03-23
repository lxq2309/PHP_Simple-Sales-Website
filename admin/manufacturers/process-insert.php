<?php
require_once '../../config.php';
require_once '../../connection.php';
// validate
if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['phone_number']))
{
    header('Location: create.php?error=Vui lòng nhập đầy đủ thông tin');
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$phone_number = $_POST['phone_number'];
$image = $_FILES['image'];

// upload file
$target_dir = "img/";
$target_file = $target_dir . time() . basename($image["name"]);
move_uploaded_file($image["tmp_name"], $target_file);

// insert
$sql = "INSERT INTO manufacturers(name, phone_number, description, image) VALUES ('$name', '$phone_number', '$description', '$target_file')";
if(mysqli_query($conn, $sql))
{
    header('Location: create.php?success=Thêm thành công');
}
else
{
    header('Location: create.php?error=Lỗi hệ thống');
}