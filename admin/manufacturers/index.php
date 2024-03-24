<?php
$title = "Danh sách nhà sản xuất";
$currentFolder = "manufactures";
require_once '../layout/header.php';
?>

<div class="main">
    <h3>Quản lý nhà sản xuất</h3>
    <div class="create"><a href="create.php"><button>Thêm mới</button></a></div>
    <?php if (isset($_GET['success'])) { ?>
        <span style="color: green;"><?php echo $_GET['success'] ?></span>
    <?php } ?>
    <table width="100%" border="1px">
        <thead>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM manufacturers";
            $manufacturers = mysqli_query($conn, $sql);
            while ($manufacturer = mysqli_fetch_assoc($manufacturers)) { ?>
                <tr>
                    <td>
                        <?php echo $manufacturer['manufacturer_id'] ?>
                    </td>
                    <td><img src="<?php echo $WEB_URL . $manufacturer['image'] ?>" alt="<?php echo $manufacturer['name'] ?>" width="100" height="100"></td>
                    <td>
                        <?php echo $manufacturer['name'] ?>
                    </td>
                    <td>
                        <?php echo $manufacturer['description'] ?>
                    </td>
                    <td>
                        <?php echo $manufacturer['phone_number'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $manufacturer['manufacturer_id'] ?>"><button
                                style="background-color: green; color: white;">Sửa</button></a>
                        <a href="delete.php?id=<?php echo $manufacturer['manufacturer_id'] ?>"><button
                                style="background-color: red; color: white;">Xoá</button></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<?php
require_once '../layout/footer.php';
?>