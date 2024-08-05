<?php
include('../config.php');
session_start();

header('Content-Type: application/json'); // Ensure the response is JSON

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['user_id'];
$address = isset($_POST['address']) ? $_POST['address'] : '';
$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';

if (empty($address)) {
    echo json_encode(['success' => false, 'error' => 'Address is required']);
    exit();
}

// Start a transaction
mysqli_begin_transaction($con);

try {
    // Insert new order
    $status = 'processing';
    $order_sql = "INSERT INTO Orders (user_id, address, status,phoneNumber) VALUES ('$user_id', '$address','$status','$phoneNumber')";
    if (!mysqli_query($con, $order_sql)) {
        throw new Exception('Order creation failed: ' . mysqli_error($con));
    }
    $order_id = mysqli_insert_id($con);

    // Get cart ID
    $cart_sql = "SELECT id FROM Carts WHERE user_id = '$user_id'";
    $cart_result = mysqli_query($con, $cart_sql);
    if (!$cart_result) {
        throw new Exception('Cart retrieval failed: ' . mysqli_error($con));
    }
    $cart = mysqli_fetch_assoc($cart_result);
    if (!$cart) {
        throw new Exception('No cart found for user');
    }
    $cart_id = $cart['id'];

    // Move items from cart to order details
    $cart_items_sql = "SELECT ci.product_id, ci.quantity
                       FROM CartItems ci 
                       JOIN Products p ON ci.product_id = p.id 
                       WHERE ci.cart_id = '$cart_id'";
    $cart_items_result = mysqli_query($con, $cart_items_sql);
    if (!$cart_items_result) {
        throw new Exception('Cart items retrieval failed: ' . mysqli_error($con));
    }

    while ($item = mysqli_fetch_assoc($cart_items_result)) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        
        
        $order_detail_sql = "INSERT INTO OrderDetails (order_id, product_id, quantity) 
                             VALUES ('$order_id', '$product_id', '$quantity')";
        if (!mysqli_query($con, $order_detail_sql)) {
            throw new Exception('Order detail insertion failed: ' . mysqli_error($con));
        }
    }

    // Delete items from cart
    $delete_cart_items_sql = "DELETE FROM CartItems WHERE cart_id = '$cart_id'";
    if (!mysqli_query($con, $delete_cart_items_sql)) {
        throw new Exception('Cart items deletion failed: ' . mysqli_error($con));
    }

    // Commit the transaction
    mysqli_commit($con);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Rollback the transaction on error
    mysqli_rollback($con);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>