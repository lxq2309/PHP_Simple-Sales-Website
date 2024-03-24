<?php
$title = "Thêm mới nhà sản xuất";
$currentFolder = "manufactures";
require_once '../layout/header.php';
?>

<div class="main">
    <h3><?php echo $title ?></h3>
    <?php if (isset($_GET['error'])) { ?>
        <span style="color: red;"><?php echo $_GET['error'] ?></span>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
        <span style="color: green;"><?php echo $_GET['success'] ?></span>
    <?php } ?>
    
    <form action="process-insert.php" method="post" enctype="multipart/form-data">
        <label for="name">Tên nhà sản xuất:</label> <br>
        <input type="text" name="name" id="name"> <br>
        <label for="description">Mô tả:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea> <br>
        <label for="phoneNumber">Số điện thoại:</label> <br>
        <input type="number" name="phone_number" id="phoneNumber"> <br>
        <label for="image">Ảnh:</label> <br>
        <input type="file" name="image" id="image"> <br><br>
        <input type="submit" value="Thêm">
    </form>
</div>

<?php
require_once '../layout/footer.php';
?>