<?php
include('../config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy giỏ hàng của người dùng
$cart_sql = "SELECT id FROM Carts WHERE user_id = '$user_id'";
$cart_result = mysqli_query($con, $cart_sql);

if (!$cart_result) {
    die('Query Failed: ' . mysqli_error($con));
}

$cart = mysqli_fetch_assoc($cart_result);

if ($cart) {
    $cart_id = $cart['id'];

    // Lấy các sản phẩm trong giỏ hàng
    $cart_items_sql = "SELECT ci.*, p.name, p.price, p.image 
                       FROM CartItems ci 
                       JOIN Products p ON ci.product_id = p.id 
                       WHERE ci.cart_id = '$cart_id'";
    $cart_items_result = mysqli_query($con, $cart_items_sql);

    if (!$cart_items_result) {
        die('Query Failed: ' . mysqli_error($con));
    }

    $cart_items = mysqli_fetch_all($cart_items_result, MYSQLI_ASSOC);
} else {
    $cart_items = [];
}
?>