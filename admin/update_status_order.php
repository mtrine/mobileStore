<?php
include('../config.php'); // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$id =  $_GET['id']; // Lấy ID từ URL
$status = mysqli_real_escape_string($con, $_POST['status']);

// Câu lệnh SQL để cập nhật thông tin đơn hàng
$sql = "UPDATE Orders SET
    status='$status',
    updated_at=NOW() 
WHERE id='$id'";

// Thực hiện câu lệnh SQL
if ($con->query($sql) === TRUE) {
    echo "Order updated successfully!";
} else {
    echo "Error updating order: " . $con->error;
}

// Đóng kết nối
$con->close();
?>