<?php
session_start();
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}
require_once '../../config.php';
require_once '../../connection.php';
$id = addslashes($_GET['id']);
$sql = "SELECT order_product.*, products.name AS product_name, products.image AS product_image, products.price AS product_price
        FROM order_product JOIN products ON order_product.product_id = products.product_id
        WHERE order_id = '$id'";
$orders = mysqli_query($conn, $sql);
if (mysqli_num_rows($orders) == 0) {
    $_SESSION['error'] = 'Hoá đơn không tồn tại';
    header('Location: index.php');
    exit;
}
$title = 'Chi tiết hoá đơn số ' . $id;
$currentFolder = "orders";
require_once '../layout/header.php';
?>

<div class="main">
    <h3>
        <?php echo $title ?>
    </h3>
    <?php if (isset($_SESSION['success'])) { ?>
        <span style="color: green;">
            <?php echo $_SESSION['success'] ?>
        </span>
        <?php unset($_SESSION['success']) ?>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
        <span style="color: red;">
            <?php echo $_SESSION['error'] ?>
        </span>
        <?php unset($_SESSION['error']) ?>
    <?php } ?>
    <table width="100%" border="1px">
        <thead>
            <th>Mã sản phẩm</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng đặt</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </thead>
        <tbody>
            <?php
            $total_price = 0;
            while ($order = mysqli_fetch_assoc($orders)) {
                $total_price += $order['product_price'];
                ?>
                <tr>
                    <td>
                        <?php echo $order['product_id'] ?>
                    </td>
                    <td><img src="<?php echo $WEB_URL . $order['product_image'] ?>" alt="" width="100"></td>
                    <td>
                        <?php echo $order['product_name'] ?>
                    </td>
                    <td>
                        <?php echo $order['quantity'] ?>
                    </td>
                    <td>
                        <?php echo $order['product_price'] ?>
                    </td>
                    <td>
                        <?php echo $order['product_price'] * $order['quantity'] ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="6">Tổng tiền:
                    <strong>
                        <?php echo $total_price ?> VNĐ
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<?php
require_once '../layout/footer.php';
?>