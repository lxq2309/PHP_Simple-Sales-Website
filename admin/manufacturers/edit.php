<?php
$title = "Sửa nhà sản xuất";
$currentFolder = "manufactures";
require_once '../layout/header.php';
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM manufacturers WHERE manufacturer_id = $id";
$manufacturers = mysqli_query($conn, $sql);
if(mysqli_num_rows($manufacturers) != 1)
{
    header('Location: index.php');
}
$manufacturer = mysqli_fetch_assoc($manufacturers);
?>

<div class="main">
    <h3><?php echo $title ?></h3>
    <?php if (isset($_SESSION['error'])) { ?>
        <span style="color: red;"><?php echo $_SESSION['error'] ?></span>
        <?php unset($_SESSION['error']) ?>
    <?php } ?>
    <?php if (isset($_SESSION['success'])) { ?>
        <span style="color: green;"><?php echo $_SESSION['success'] ?></span>
        <?php unset($_SESSION['success']) ?>
    <?php } ?>
    
    <form action="process-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer['manufacturer_id'] ?>">
        <label for="name">Tên nhà sản xuất:</label> <br>
        <input type="text" name="name" id="name" value="<?php echo $manufacturer['name'] ?>"> <br>
        <label for="description">Mô tả:</label> <br>
        <textarea name="description" id="description" cols="30" rows="10"><?php echo $manufacturer['description'] ?></textarea> <br>
        <label for="phoneNumber">Số điện thoại:</label> <br>
        <input type="text" name="phone_number" id="phoneNumber" value="<?php echo $manufacturer['phone_number'] ?>"> <br>
        <label for="image">Ảnh:</label> <br>
        <img src="<?php echo $WEB_URL . $manufacturer['image'] ?>" alt="<?php echo $manufacturer['name'] ?>" width="100"> <br>
        <input type="hidden" name="old_image" value="<?php echo $manufacturer['image'] ?>">
        <input type="file" name="new_image" id="image"> <br><br>
        <input type="submit" value="Sửa">
    </form>
</div>

<?php
require_once '../layout/footer.php';
?>