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
    $current_status = $product['isInStock'];
    $new_status = $current_status == 1 ? 0 : 1; 

    $sql_update = "UPDATE products SET
    isInStock='$new_status',
    updated_at=NOW() 
WHERE id='$product_id'";
if ($con->query($sql_update) === TRUE) {
    echo "Order updated successfully!";
} else {
    echo "Error updating order: " . $con->error;
}
} else {
    $product = null; // Trả về null nếu không tìm thấy sản phẩm
}


// Đóng kết nối
$con->close();
?>