<?php
$title = "Danh sách sản phẩm";
$currentFolder = "products";
require_once '../layout/header.php';
?>

<div class="main">
    <h3>Quản lý sản phẩm</h3>
    <div class="create"><a href="create.php"><button>Thêm mới</button></a></div>
    <?php if (isset ($_GET['success'])) { ?>
        <span style="color: green;">
            <?php echo $_GET['success'] ?>
        </span>
    <?php } ?>
    <table width="100%" border="1px">
        <thead>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Nhà sản xuất</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT products.*, manufacturers.name AS manufacturer_name 
                    FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id";
            $products = mysqli_query($conn, $sql);
            while ($product = mysqli_fetch_assoc($products)) { ?>
                <tr>
                    <td>
                        <?php echo $product['product_id'] ?>
                    </td>
                    <td><img src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>" width="100"
                            height="100"></td>
                    <td>
                        <a href="#">
                            <?php echo $product['name'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $product['price'] ?>
                    </td>
                    <td>
                        <?php echo $product['manufacturer_name'] ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $product['product_id'] ?>"><button
                                style="background-color: green; color: white;">Sửa</button></a>
                        <a href="delete.php?id=<?php echo $product['product_id'] ?>"><button
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