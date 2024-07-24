<?php
include('../config.php');

if(isset($_POST['brand_id'])){
    $brand_id = mysqli_real_escape_string($con, $_POST['brand_id']);
    
    $product_sql = "SELECT * FROM products WHERE brand_id = '$brand_id'";
    $product_result = $con->query($product_sql);
    
    if ($product_result->num_rows > 0) {
        while($row = $product_result->fetch_assoc()) {
            echo '<div class="product" data-id="' . $row["id"] . '">';
            echo '<img src="../images/Iphone15ProMax.jpg">';
            echo '<h2>' . $row["name"] . '</h2>';
            echo '<p class="new-price">' . $row["price"] . ' đ</p>';
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
            echo '<button type="submit" name="add_to_cart" class="add-to-cart-button">Thêm vào giỏ hàng</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "Không có sản phẩm nào";
    }
    $con->close();
}
?>