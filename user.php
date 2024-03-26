<?php
require_once 'config.php';
require_once 'connection.php';
if (empty ($_GET['id'])) {
    header('Location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT * FROM customers WHERE customer_id = '$id'";
$customer = mysqli_query($conn, $sql)->fetch_assoc();

if (empty ($customer)) {
    header('Location: index.php');
    exit;
}
?>

<?php
$title = $customer['name'];
$currentAction = "customer";
require_once 'header.php';
?>

<div class="main">
    <div class="customer-detail">
        <div class="top">
            <div class="left">
                <div class="image">
                    <img src="<?php echo $WEB_URL . '/images/users/default.jpg' ?>" alt="" width="100%" height="100%">
                </div>
            </div>
            <div class="right">
                <div class="name">
                    <?php echo $customer['name'] ?>
                </div>
                <div class="address"> 
                    Địa chỉ:
                    <?php echo $customer['address'] ?>
                </div>
                <div class="email"> 
                    Email:
                    <?php echo $customer['email'] ?>
                </div>
                <div class="phone-number"> 
                    Số điện thoại: 
                    <?php echo $customer['phone_number'] ?>
                </div>
            </div>
        </div>
        <div class="bottom">
            
        </div>



    </div>


</div>

<?php
require_once 'footer.php';
?>