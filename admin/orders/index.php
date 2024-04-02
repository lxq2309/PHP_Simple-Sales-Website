<?php
$title = "Danh sách các hoá đơn bán đã tạo";
$currentFolder = "orders";
require_once '../layout/header.php';
?>

<div class="main">
    <h3>Quản lý hoá đơn bán</h3>
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
            <th>ID</th>
            <th>Tài khoản đặt hàng</th>
            <th>Tên người nhận</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT orders.*, customers.name AS customer_name
                    FROM orders JOIN customers ON orders.customer_id = customers.customer_id
                    ";
            $orders = mysqli_query($conn, $sql);
            while ($order = mysqli_fetch_assoc($orders)) { ?>
                <tr>
                    <td>
                        <?php echo $order['order_id'] ?>
                    </td>
                    <td>
                        <a href="<?php echo $WEB_URL . '/user.php?id=' . $order['customer_id'] ?>">
                            <?php echo $order['customer_name'] ?>
                        </a>

                    </td>
                    <td>
                        <?php echo $order['name_receiver'] ?>
                    </td>
                    <td>
                        <?php echo $order['phone_receiver'] ?>
                    </td>
                    <td>
                        <?php echo $order['address_receiver'] ?>
                    </td>
                    <td>
                        
                        <?php
                        switch ($order['status']) {
                            case -1:
                                echo '<span style="color: red;">Đã huỷ</span>';
                                break;
                            case 0:
                                echo '<span style="color: green;">Đang xử lý</span>';
                                break;
                            case 1:
                                echo '<span style="color: blue;">Đang giao hàng</span>';
                                break;
                            case 2:
                                echo '<span style="color: violet;">Đã giao</span>';
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $order['total_price'] ?> VNĐ
                    </td>
                    <td>
                        <?php echo $order['created_at'] ?>
                    </td>
                    <td>
                        <a href="detail.php?id=<?php echo $order['order_id'] ?>"><button
                                style="background-color: black; color: white;">Xem chi tiết</button></a>
                        <?php if ($order['status'] == 0) { ?>
                            <a href="update.php?id=<?php echo $order['order_id'] ?>&status=-1"><button
                                    style="background-color: red; color: white;">Huỷ đơn</button></a>
                            <a href="update.php?id=<?php echo $order['order_id'] ?>&status=1"><button
                                    style="background-color: green; color: white;">Duyệt đơn</button></a>
                        <?php } else if ($order['status'] == 1) { ?>
                                <a href="update.php?id=<?php echo $order['order_id'] ?>&status=2"><button
                                        style="background-color: blue; color: white;">Hoàn thành đơn</button></a>
                        <?php } ?>

                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once '../layout/footer.php';
?>