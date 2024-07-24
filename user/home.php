<?php
    include('../config.php');
    session_start(); // Đảm bảo session đã được bắt đầu

$message = '';
//Login
if(isset($_POST['login'])){
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $pass= mysqli_real_escape_string($con,$_POST['password']);
    $select_users = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if(mysqli_num_rows($select_users)>0){
        $row=mysqli_fetch_assoc($select_users);
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_name']=$row['username'];
        $_SESSION['user_email']=$row['email'];
        header('location:home.php');
        exit();
    }
    else{
        $message = 'Sai email hoặc mật khẩu';
    }
} 
//End Login
//Add to cart
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['user_id'])) {
        $message = 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng';
    } else {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $quantity = 1;

        // Kiểm tra xem người dùng đã có giỏ hàng chưa
        $check_cart = mysqli_query($con, "SELECT * FROM `Carts` WHERE user_id = '$user_id'") or die('query failed select');
        if (mysqli_num_rows($check_cart) > 0) {
            $cart = mysqli_fetch_assoc($check_cart);
            $cart_id = $cart['id'];
        } else {
            // Tạo giỏ hàng mới cho người dùng
            mysqli_query($con, "INSERT INTO `Carts` (user_id) VALUES ('$user_id')") or die('query failed insert');
            $cart_id = mysqli_insert_id($con);
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $check_cart_items = mysqli_query($con, "SELECT * FROM `CartItems` WHERE cart_id = '$cart_id' AND product_id = '$product_id'") or die('query failed');
        if (mysqli_num_rows($check_cart_items) > 0) {
            $message = 'Sản phẩm đã có trong giỏ hàng';
        } else {
            mysqli_query($con, "INSERT INTO `CartItems` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')") or die('query failed');
            $message = 'Sản phẩm đã được thêm vào giỏ hàng';
        }
    }
}
//GET PRODUCTS FROM BRAND

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneZone</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <?php
    include('../config.php');
    include('./header.php');
    ?>

    <div class="main-content">
        <div class="carousel">
            <img src="../images/PosterIphone15.jpg" alt="Iphone 15 Pro Max">
            <img src="../images/SSGalaxyUltraS23.jpg" alt="SamSung Galaxy S23 Ultra">
            <img src="../images/OppRenoF11.jpg" alt="Oppo Reno F11">
            <div class="carousel-nav">
                <div class="active"></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="brand-container">
        <?php
    $brand_sql = "SELECT * FROM brands";
    $brand_result = $con->query($brand_sql);

    if ($brand_result->num_rows > 0) {
        while($row = $brand_result->fetch_assoc()) {
            echo '<div class="brand-item" data-id="' . $row["id"] . '"><img src="../images/Logo_Samsung.png"></div>';
        }
    } else {
        echo "0 results";
    }
    ?>
    </div>

    <div class="products">
        <?php
        $product_sql = "SELECT * FROM products";
        $product_result = $con->query($product_sql);

        if ($product_result->num_rows > 0) {
            while($row = $product_result->fetch_assoc()) {
                echo '<div class="product" data-id="' . $row["id"] . '">';
                // echo '<img src="'.$row["image"].'">';
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
        ?>
    </div>
    <?php
        include('./login.php');
    ?>
    <?php
        include('./footer.php');
        $con->close();
    ?>

    <script src="../js/home.js"></script>
    <script>
    <?php 
    if($message != ''){
    echo "alert('$message');";
    }
    ?>
    </script>
</body>

</html>