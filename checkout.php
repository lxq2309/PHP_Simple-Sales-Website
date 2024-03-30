<?php
$title = "Thanh toán";
$currentAction = "checkout";
require_once 'header.php';
?>

<?php
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
?>

<div class="main">
    <?php if (isset($_SESSION['error'])) { ?>
        <div style="color: red; text-align: left">
            <?php echo $_SESSION['error'] ?>
            <?php unset($_SESSION['error']) ?>
        </div>
    <?php } ?>
    <h2>THANH TOÁN ĐƠN HÀNG</h2>
    <table border="1" width="100%">
        <thead>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </thead>
        <tbody>
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
                        <?php echo $each['quantity'] ?>
                    </td>
                    <td>
                        <?php echo $each['price'] * $each['quantity'] ?> VNĐ
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="7">
                    <h3 style="text-align: left">Tổng giá trị đơn hàng:
                        <?php echo $totalPrice ?> VNĐ
                    </h3>
                </td>
            </tr>
        </tbody>
    </table>
    <form action="process-checkout.php" method="POST">
        <?php 
            $customer_id = $_SESSION['customer_id'];
            $sql = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
            $customer = mysqli_query($conn, $sql)->fetch_assoc();
        ?>
        <label for="name_receiver">Tên người nhận: </label> <input type="text" name="name_receiver" value="<?php echo $customer['name'] ?>"> <br>
        <label for="phone_receiver">Số điện thoại: </label> <input type="text" name="phone_receiver" value="<?php echo $customer['phone_number'] ?>"> <br>
        <label for="address_receiver">Địa chỉ: </label> <input type="text" name="address_receiver" value="<?php echo $customer['address'] ?>"> <br>
        <input type="submit" value="Xác nhận">
    </form>
</div>

<?php
require_once 'footer.php';
?>