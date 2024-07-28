<?php
    include '../config.php';
    session_start();
    $product_id = $_GET['id'];
    $sql= "SELECT * FROM products WHERE id = $product_id";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
    }
    else{
        echo "Không tìm thấy sản phẩm";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('./header.php'); ?>

    <div class="product-detail">
        <h1><?php echo $product['name']; ?></h1>
        <div class="product-info">
            <img src="<?php echo $product['image']; ?>">
            <div class="product-details">
                <div class="price">
                    <h3><?php echo $product['price']; ?> đ</h3>
                </div>

                <div class="delivery-info">NHẬN HÀNG TRONG 1 GIỜ</div>

                <div class="promotion">
                    <h3>KHUYẾN MÃI</h3>
                    <p>Sản phẩm sẽ được giảm 4.000.000₫ khi mua hàng online bằng thẻ VPBank hoặc tin nhắn SMS</p>
                </div>

                <div class="included-items">
                    <h3>Trong hộp có:</h3>
                    <p>Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng</p>
                </div>

                <div class="warranty">
                    <p>Bảo hành chính hãng 12 tháng.</p>
                    <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                </div>

                <button class="add-to-cart-button" data-product-id="<?php echo $product['id']; ?>">Thêm vào giỏ
                    hàng</button>
            </div>

            <div class="specifications">
                <h3>Thông số kỹ thuật</h3>
                <table>
                    <tr>
                        <td>Màu sắc</td>
                        <td><?php echo $product['color']; ?></td>
                    </tr>
                    <tr>
                        <td>Kích thước màn hình</td>
                        <td><?php echo $product['screen']; ?></td>
                    </tr>
                    <tr>
                        <td>Hệ điều hành</td>
                        <td><?php echo $product['operating_system']; ?></td>
                    </tr>
                    <tr>
                        <td>Camera sau</td>
                        <td><?php echo $product['rear_camera']; ?></td>
                    </tr>
                    <tr>
                        <td>Camera trước</td>
                        <td><?php echo $product['front_camera']; ?></td>
                    </tr>
                    <tr>
                        <td>CPU</td>

                        <td><?php echo $product['cpu']; ?></td>

                    </tr>
                    <tr>
                        <td>RAM</td>

                        <td><?php echo $product['ram']; ?></td>

                    </tr>
                    <tr>
                        <td>Bộ nhớ trong</td>
                        <td>
                            <?php echo $product['internal_storage']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Thẻ nhớ</td>
                        <td> <?php echo $product['memory_card']; ?></td>
                    </tr>
                    <tr>
                        <td>Dung lượng pin</td>
                        <td> <?php echo $product['battery_capacity']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/home.js"></script>
</body>

</html>