<?php
include('../config.php'); // Kết nối đến database

// Lấy và sanitize product ID từ GET request
$product_id = mysqli_real_escape_string($con, $_GET['id']);

// Truy vấn sản phẩm theo ID
$sql = "SELECT p.*, b.name as brand_name 
        FROM Products p 
        LEFT JOIN Brands b ON p.brand_id = b.id 
        WHERE p.id = '$product_id'";

$result = $con->query($sql);

// Kiểm tra nếu sản phẩm tồn tại
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    $product = null; // Trả về null nếu không tìm thấy sản phẩm
}

// Đóng kết nối
mysqli_close($con);

// Đặt header là JSON
header('Content-Type: application/json');

// Trả về dữ liệu sản phẩm dưới dạng JSON
echo json_encode($product);
exit();