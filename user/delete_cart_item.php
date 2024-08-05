<?php
include('../config.php');
session_start();

$response = ['success' => false];

if (isset($_SESSION['user_id']) && isset($_POST['id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = mysqli_real_escape_string($con, $_POST['id']);

    // Kiểm tra xem sản phẩm thuộc về người dùng không
    $check_sql = "SELECT * FROM CartItems ci 
                  JOIN Carts c ON ci.cart_id = c.id 
                  WHERE ci.product_id = '$product_id' AND c.user_id = '$user_id'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Xóa sản phẩm khỏi giỏ hàng
        $delete_sql = "DELETE FROM CartItems WHERE product_id = '$product_id'";
        if (mysqli_query($con, $delete_sql)) {
            $response['success'] = true;
        } else {
            $response['message'] = 'Lỗi khi xóa sản phẩm: ' . mysqli_error($con);
        }
    } else {
        $response['message'] = 'Sản phẩm không thuộc về người dùng này.';
    }
} else {
    $response['message'] = 'Yêu cầu không hợp lệ.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>