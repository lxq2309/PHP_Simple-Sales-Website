<?php
$title = "Giỏ hàng";
$currentAction = "cart";
require_once 'header.php';
?>

<?php
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
?>

<div class="main">
    <?php if (isset($_SESSION['success'])) { ?>
        <div style="color: green; text-align: left">
            <?php echo $_SESSION['success'] ?>
            <?php unset($_SESSION['success']) ?>
        </div>
    <?php } ?>
    <h2>GIỎ HÀNG</h2>
    <table border="1" width="100%">
        <thead>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php if (empty($cart)) { ?>
                <tr>
                    <td colspan="7" style="text-align:center;">
                        <?php echo 'Chưa có sản phẩm nào được thêm vào giỏ hàng' ?>
                    </td>
                </tr>
            <?php } else { ?>
                <?php $totalPrice = 0 ?>
                <?php foreach ($cart as $id => $each) { ?>
                    <?php $price = $each['quantity'] * $each['price'] ?>
                    <?php $totalPrice += $price ?>
                    <tr>
                        <td>
                            <?php echo $id ?>
                        </td>
                        <td><img src="<?php echo $WEB_URL . $each['image'] ?>" alt="<?php echo $each['name'] ?>" width="100px">
                        </td>
                        <td>
                            <?php echo $each['name'] ?>
                        </td>
                        <td>
                            <?php echo $price ?> VNĐ
                        </td>
                        <td>
                            <a href="update-quantity-from-cart.php?id=<?php echo $id ?>&type=dec">[-]</a>
                            <?php echo $each['quantity'] ?>
                            <a href="update-quantity-from-cart.php?id=<?php echo $id ?>&type=inc">[+]</a>
                        </td>
                        <td>
                            <?php echo $each['price'] * $each['quantity'] ?> VNĐ
                        </td>
                        <td><a href="delete-from-cart.php?id=<?php echo $id ?>">Xoá</a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <?php if (isset($totalPrice)) { ?>
                <tr>
                    <td colspan="7">
                        <h3 style="text-align: left">Tổng giá trị đơn hàng:
                            <?php echo $totalPrice ?> VNĐ
                        </h3>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php if (isset($totalPrice)) { ?>
        <a href="checkout.php"><button>Thanh toán</button></a>
    <?php } ?>

</div>

<?php
require_once 'footer.php';
?>