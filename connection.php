<?php
$conn = null;
try {
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
} catch (Throwable $th) {
    die ('Không thể kết nối đến server, lỗi: ' . $th->getMessage());
}