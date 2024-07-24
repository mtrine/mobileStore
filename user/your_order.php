<?php
    include('../config.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('./header.php'); ?>
    <div class="order-container">
        <div class="order-item" data-id="">
            <h3>Mã đơn hàng-123241241321313131</h2>
                <p>Ngày đặt: 22/07/2024</p>
                <p>Trạng thái: Đang giao hàng</p>
                <a href="./detail_order.php">Xem chi tiết đơn hàng</a>
        </div>

    </div>
    <?php include('./footer.php'); ?>
</body>

</html>