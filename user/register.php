<?php
include('../config.php');
session_start();
$message = array(); // Initialize an array to store messages

if(isset($_POST['signup'])){
    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);

    // Check if email already exists in the database
    $select_users = mysqli_query($con, "SELECT * FROM `Users` WHERE email = '$email'") or die('Query failed: ' . mysqli_error($con));
    if(mysqli_num_rows($select_users) > 0){
        $message[] = 'Email đã tồn tại';
    } else {      
        // Insert user into database if email does not exist
        $admin = 0; // Set user as non-admin by default
        $insert_user = mysqli_query($con, "INSERT INTO `Users` (username, email, password,admin) VALUES ('$name', '$email', '$pass','$admin')") or die('Query failed insert: ' . mysqli_error($con));
        if($insert_user){
            // Get the ID of the newly inserted user
            $user_id = mysqli_insert_id($con);

            // Insert into Carts table
            $insert_cart = mysqli_query($con, "INSERT INTO `Carts` (user_id) VALUES ('$user_id')") or die('Query failed insert cart: ' . mysqli_error($con));
            if($insert_cart){
                // Add success message
                $message[] = 'Đăng ký thành công và giỏ hàng đã được tạo';
            } else {
                // Add error message if cart creation fails
                $message[] = 'Đăng ký thành công nhưng tạo giỏ hàng thất bại: ' . mysqli_error($con);
            }
            
            // Clear input fields after successful registration (optional)
            $_POST = array();
        } else {
            // Show detailed SQL error message
            $message[] = 'Đăng ký thất bại: ' . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include('./header.php'); ?>
    <div class="container">
        <div class="register-form">
            <h2>ĐĂNG KÝ TÀI KHOẢN MỚI</h2>
            <?php
            // Display messages if any
            if(!empty($message)){
                foreach($message as $msg){
                    echo '<p>' . $msg . '</p>';
                }
            }
            ?>
            <form method="post">
                <label for="name">Tên</label>
                <input type="text" id="name" name="name">

                <!-- <label for="phone">Điện thoại</label>
                <input type="tel" id="phone" name="phone"> -->

                <label for="email">Nhập địa chỉ email của bạn *</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mật khẩu *</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Xác nhận mật khẩu *</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <button type="submit" name="signup">Đăng ký</button>
            </form>
        </div>
        <div class="benefits">
            <h2>LỢI ÍCH CỦA VIỆC TRỞ THÀNH MỘT THÀNH VIÊN ĐĂNG KÝ</h2>
            <ul>
                <li>Đăng nhập vào bất kỳ lúc nào để kiểm tra trạng thái đơn đặt hàng</li>
                <li>Cá nhân hoá việc mua sắm của bạn</li>
                <li>Mua hàng và thanh toán nhanh hơn trong lần tiếp theo</li>
            </ul>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
<script>
<?php
if(!empty($message)){
    echo 'alert("' . $message[0] . '")';
}
?>
</script>

</html>