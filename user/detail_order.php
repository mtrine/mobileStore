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
        <h2>Mã đơn hàng-123241241321313131</h2>
        <div class="detail-order-item">
            <img src="../images/Iphone15ProMax.jpg">
            <div>
                <h3>Iphone 15 ProMax</h3>
                <p class="price">20.000.000 đ</p>
            </div>
            <div>
                <p>X1</p>
            </div>
        </div>
        <div class="order-detail-summary">
            <div>
                <p>Tổng tiền</p>
                <p class="price">20.000.000 đ</p>
            </div>
        </div>
    </div>
</body>

</html>