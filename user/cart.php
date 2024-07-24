<?php include('./fecth_cart.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của tôi</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('./header.php'); ?>
    <div class="cart-container">
        <?php if (!empty($cart_items)) { ?>
        <?php foreach ($cart_items as $item) { ?>
        <div class="cart-item">
            <!-- <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>"> -->
            <img src="../images/Iphone15ProMax.jpg">
            <div>
                <h3> <?php echo $item['name'] ?></h3>
                <p class="price" data-price="<?php echo $item['price']; ?>">
                    <?php echo number_format($item['price'], 0, ',', '.'); ?> đ
                </p>
            </div>
            <div>
                <input type="number" value="<?php echo $item['quantity']; ?>" min="1">
                <button class="delete-btn" data-id="<?php echo $item['id']; ?>">Xóa</button>
            </div>
        </div>
        <?php } ?>
        <div class="cart-summary">
            <div>
                <p>Địa chỉ giao hàng:</p>
                <input type="text" id="address" placeholder="Nhập địa chỉ">
            </div>
            <div>
                <p>Tổng tiền</p>
                <p id="total-price"></p>
            </div>
            <button id="confirm-order-btn" class="confirm-btn">Xác nhận đơn</button>
        </div>
        <?php } else { ?>
        <p>Giỏ hàng của bạn đang trống</p>
        <?php } ?>
    </div>
</body>
<script src="../js/cart.js"></script>

</html>