<?php
include('../config.php');
session_start(); // Đảm bảo session đã được bắt đầu

$response = ['success' => false, 'message' => ''];

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    if (!isset($_SESSION['user_id'])) {
        $response['message'] = 'Bạn cần đăng nhập để thực hiện hành động này';
    } else {
        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
        $quantity = (int)$_POST['quantity'];
        $user_id = $_SESSION['user_id'];

        if ($quantity < 1) {
            $response['message'] = 'Số lượng không hợp lệ';
        } else {
            // Kiểm tra xem người dùng đã có giỏ hàng chưa
            $check_cart = mysqli_query($con, "SELECT * FROM `Carts` WHERE user_id = '$user_id'") or die('query failed select');
            if (mysqli_num_rows($check_cart) > 0) {
                $cart = mysqli_fetch_assoc($check_cart);
                $cart_id = $cart['id'];

                // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                $check_cart_item = mysqli_query($con, "SELECT * FROM `CartItems` WHERE cart_id = '$cart_id' AND product_id = '$product_id'") or die('query failed select');
                
                if (mysqli_num_rows($check_cart_item) > 0) {
                    // Cập nhật số lượng sản phẩm nếu đã tồn tại
                    $update_query = "UPDATE `CartItems` SET quantity = '$quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
                } else {
                    // Thêm sản phẩm vào giỏ hàng nếu chưa tồn tại
                    $update_query = "INSERT INTO `CartItems` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')";
                }

                if (mysqli_query($con, $update_query)) {
                    $response['success'] = true;
                } else {
                    $response['message'] = 'Lỗi cập nhật giỏ hàng';
                }
            } else {
                $response['message'] = 'Giỏ hàng không tồn tại';
            }
        }
    }
} else {
    $response['message'] = 'Yêu cầu không hợp lệ';
}

echo json_encode($response);
?>