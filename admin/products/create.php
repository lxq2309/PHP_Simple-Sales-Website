<?php
$title = "Thêm mới sản phẩm";
$currentFolder = "products";
require_once '../layout/header.php';
?>

<?php
$sql = "SELECT * FROM manufacturers";
$manufacturers = mysqli_query($conn, $sql);
?>

<div class="main">
    <h3>
        <?php echo $title ?>
    </h3>
    <?php if (isset ($_SESSION['error'])) { ?>
        <span style="color: red;">
            <?php echo $_SESSION['error'] ?>
            <?php unset($_SESSION['error']) ?>
        </span>
    <?php } ?>
    <?php if (isset ($_SESSION['success'])) { ?>
        <span style="color: green;">
            <?php echo $_SESSION['success'] ?>
            <?php unset($_SESSION['success']) ?>
        </span>
    <?php } ?>

    <form action="process-insert.php" method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label> <br>
        <input type="text" name="name" id="name"> <br>
        <label for="description">Mô tả:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea> <br>
        <label for="price">Giá:</label> <br>
        <input type="number" name="price" id="price"> <br>
        <label for="manufacturer">Nhà sản xuất:</label> <br>
        <select name="manufacturer_id" id="manufacturer">
            <?php while ($manufacturer = mysqli_fetch_assoc($manufacturers)) { ?>
                <option value="<?php echo $manufacturer['manufacturer_id'] ?>">
                    <?php echo $manufacturer['name'] ?>
                </option>
            <?php } ?>

        </select>
        <label for="image">Ảnh:</label> <br>
        <input type="file" name="image" id="image"> <br><br>
        <input type="submit" value="Thêm">
    </form>
</div>

<?php
require_once '../layout/footer.php';
?>