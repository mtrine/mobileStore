<?php 
include('../config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng </title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('./header.php')?>
    <div class="detail-order-container">
        <h2 id="orderId"></h2>
        <div id="orderItems">
            <!-- Chi tiết sản phẩm sẽ được thêm vào đây -->
        </div>
        <div class="order-detail-summary" id="orderSummary">
            <div>
                <p>Tổng tiền</p>
                <p class="price" id="totalPrice">0 đ</p>
            </div>
        </div>
    </div>
    <?php include('./footer.php')?>
    <script src="../js/order_detail.js"></script>
</body>

</html>