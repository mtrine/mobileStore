<?php
include('../config.php');
session_start(); // Đảm bảo session đã được bắt đầu

$response = ['message' => ''];

if (isset($_POST['product_id'])) {
    if (!isset($_SESSION['user_id'])) {
        $response['message'] = 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng';
    } else {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $quantity = 1;

        // Kiểm tra xem người dùng đã có giỏ hàng chưa
        $check_cart = mysqli_query($con, "SELECT * FROM `Carts` WHERE user_id = '$user_id'");
        if (!$check_cart) {
            $response['message'] = 'Query failed select: ' . mysqli_error($con);
            echo json_encode($response);
            exit();
        }
        if (mysqli_num_rows($check_cart) > 0) {
            $cart = mysqli_fetch_assoc($check_cart);
            $cart_id = $cart['id'];
        } else {
            // Tạo giỏ hàng mới cho người dùng
            if (!mysqli_query($con, "INSERT INTO `Carts` (user_id) VALUES ('$user_id')")) {
                $response['message'] = 'Query failed insert: ' . mysqli_error($con);
                echo json_encode($response);
                exit();
            }
            $cart_id = mysqli_insert_id($con);
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $check_cart_items = mysqli_query($con, "SELECT * FROM `CartItems` WHERE cart_id = '$cart_id' AND product_id = '$product_id'");
        if (!$check_cart_items) {
            $response['message'] = 'Query failed: ' . mysqli_error($con);
            echo json_encode($response);
            exit();
        }
        if (mysqli_num_rows($check_cart_items) > 0) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng quantity lên 1
            $cart_item = mysqli_fetch_assoc($check_cart_items);
            $new_quantity = $cart_item['quantity'] + 1;
            if (!mysqli_query($con, "UPDATE `CartItems` SET quantity = '$new_quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'")) {
                $response['message'] = 'Query failed update: ' . mysqli_error($con);
                echo json_encode($response);
                exit();
            }
            $response['message'] = 'Sản phẩm đã được thêm vào giỏ hàng';
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
            if (!mysqli_query($con, "INSERT INTO `CartItems` (cart_id, product_id, quantity) VALUES ('$cart_id', '$product_id', '$quantity')")) {
                $response['message'] = 'Query failed: ' . mysqli_error($con);
                echo json_encode($response);
                exit();
            }
            $response['message'] = 'Sản phẩm đã được thêm vào giỏ hàng';
        }
    }
} else {
    $response['message'] = 'Yêu cầu không hợp lệ';
}

echo json_encode($response);
?>