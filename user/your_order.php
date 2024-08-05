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
    <div class="order-container" id="orderContainer">
        <!-- Các đơn hàng sẽ được hiển thị ở đây -->
    </div>

    <script src="../js/order.js"></script>
    <?php include('./footer.php'); ?>

</body>

</html>