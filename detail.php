<?php
require_once 'config.php';
require_once 'connection.php';
if (empty($_GET['id'])) {
    header('Location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT products.*, manufacturers.name AS manufacturer_name 
        FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id
        WHERE product_id = '$id'";
$product = mysqli_query($conn, $sql)->fetch_assoc();

if (empty($product)) {
    header('Location: index.php');
    exit;
}
?>

<?php
$title = $product['name'];
$currentAction = "product-detail";
require_once 'header.php';
?>

<div class="main">
    <?php if (isset($_SESSION['success'])) { ?>
        <div style="color: green; text-align: left">
            <?php echo $_SESSION['success'] ?>
            <?php unset($_SESSION['success']) ?>
        </div>
    <?php } ?>
    <div class="product-detail">
        <div class="top">
            <div class="left">
                <div class="image">
                    <img src="<?php echo $WEB_URL . $product['image'] ?>" alt="" width="100%" height="100%">
                </div>
            </div>
            <div class="right">
                <div class="name">

                    <?php echo $product['name'] ?>
                </div>
                <div class="description">
                    <?php echo nl2br($product['description']) ?>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="price">
                Giá tiền:
                <?php echo $product['price'] ?> VND
            </div>

            <div class="manufaturer">
                Nhà cung cấp:
                <?php echo $product['manufacturer_name'] ?>
            </div>

            <div class="add-to-cart">
                <a href="add-to-cart.php?id=<?php echo $id ?>"><button>Thêm vào giỏ hàng</button></a>
            </div>
        </div>



    </div>


</div>

<?php
require_once 'footer.php';
?>