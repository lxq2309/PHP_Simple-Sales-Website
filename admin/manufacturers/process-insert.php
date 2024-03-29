<?php
require_once '../../config.php';
require_once '../../connection.php';

session_start();
// validate
if (empty ($_POST['name']) || empty ($_POST['description']) || empty ($_POST['phone_number'])) {
    $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
    header('Location: create.php');
    exit;
}

$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$phone_number = addslashes($_POST['phone_number']);
$image = $_FILES['image'];

// upload file
$target_dir = "/images/manufacturers/";
$target_file = $target_dir . time() . basename($new_image["name"]);
move_uploaded_file($new_image["tmp_name"], '../..' . $target_file);

// insert
$sql = "INSERT INTO manufacturers(name, phone_number, description, image) VALUES ('$name', '$phone_number', '$description', '$target_file')";
if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = 'Thêm thành công';
    header('Location: create.php');
} else {
    $_SESSION['error'] = 'Lỗi hệ thống';
    header('Location: create.php');
}