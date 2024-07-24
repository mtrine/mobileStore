<?php
include('../config.php');
session_start();

$response = ['success' => false];

if (isset($_SESSION['user_id']) && isset($_POST['id'])) {
    $user_id = $_SESSION['user_id'];
    $cart_item_id = $_POST['id'];

    // Check if the cart item belongs to the user
    $check_sql = "SELECT ci.id FROM CartItems ci 
                  JOIN Carts c ON ci.cart_id = c.id 
                  WHERE ci.id = '$cart_item_id' AND c.user_id = '$user_id'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Delete the cart item
        $delete_sql = "DELETE FROM CartItems WHERE id = '$cart_item_id'";
        if (mysqli_query($con, $delete_sql)) {
            $response['success'] = true;
        }
    }
}

echo json_encode($response);
?>