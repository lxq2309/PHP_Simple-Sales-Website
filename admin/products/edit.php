<?php
$title = "Sửa sản phẩm";
$currentFolder = "products";
require_once '../layout/header.php';
?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = $id";
$products = mysqli_query($conn, $sql);
if (mysqli_num_rows($products) != 1) {
    header('Location: index.php');
}
$product = mysqli_fetch_assoc($products);

$sql = "SELECT * FROM manufacturers";
$manufacturers = mysqli_query($conn, $sql);
?>

<div class="main">
    <h3>
        <?php echo $title ?>
    </h3>
    <?php if (isset ($_GET['error'])) { ?>
        <span style="color: red;">
            <?php echo $_GET['error'] ?>
        </span>
    <?php } ?>
    <?php if (isset ($_GET['success'])) { ?>
        <span style="color: green;">
            <?php echo $_GET['success'] ?>
        </span>
    <?php } ?>

    <form action="process-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
        <label for="name">Tên sản phẩm:</label> <br>
        <input type="text" name="name" id="name" value="<?php echo $product['name'] ?>"> <br>
        <label for="description">Mô tả:</label> <br>
        <textarea name="description" id="description" cols="30"
            rows="10"><?php echo $product['description'] ?></textarea> <br>
        <label for="price">Giá:</label> <br>
        <input type="number" name="price" id="price" value="<?php echo $product['price'] ?>"> <br>
        <label for="manufacturer">sản phẩm:</label> <br>
        <select name="manufacturer_id" id="manufacturer">
            <?php while ($manufacturer = mysqli_fetch_assoc($manufacturers)) { ?>
                <option value="<?php echo $manufacturer['manufacturer_id'] ?>" 
                <?php echo $product['manufacturer_id'] == $manufacturer['manufacturer_id'] ? 'selected' : '' ?>>
                    <?php echo $manufacturer['name'] ?>
                </option>
            <?php } ?>

        </select>
        <br>
        <label for="image">Ảnh:</label> <br>
        <img src="<?php echo $WEB_URL . $product['image'] ?>" alt="<?php echo $product['name'] ?>" width="100"> <br>
        <input type="hidden" name="old_image" value="<?php echo $product['image'] ?>">
        <input type="file" name="new_image" id="image"> <br><br>
        <input type="submit" value="Sửa">
    </form>
</div>

<?php
require_once '../layout/footer.php';
?>