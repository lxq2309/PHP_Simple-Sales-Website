<?php
$title = "Trang chủ";
$currentAction = "index";
require_once 'header.php';
?>

<?php
$sql = "SELECT * FROM products";
$products = mysqli_query($conn, $sql);
?>

<div class="main">
    <?php if (isset($_SESSION['success'])) { ?>
        <div style="color: green; text-align: left">
            <?php echo $_SESSION['success'] ?>
            <?php unset($_SESSION['success']) ?>
        </div>
    <?php } ?>
    <h2>DANH SÁCH SẢN PHẨM</h2>
    <?php while ($product = mysqli_fetch_assoc($products)) { ?>
        <div class="col">
            <div class="product">
                <div class="image">
                    <img src="<?php echo $WEB_URL . $product['image'] ?>" alt="" width="100%" height="100%">
                </div>
                <div class="name">
                    <?php echo $product['name'] ?>
                </div>
                <div class="price">
                    <?php echo $product['price'] ?> VND
                </div>
                <div class="detail">
                    <a href="<?php echo $WEB_URL . '/add-to-cart.php?id=' . $product['product_id'] ?>">Thêm vào giỏ hàng</a>|
                    <a href="<?php echo $WEB_URL . '/detail.php?id=' . $product['product_id'] ?>">Chi tiết >></a>
                </div>
            </div>
        </div>
    <?php } ?>


</div>

<?php
require_once 'footer.php';
?>