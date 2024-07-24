<?php
include('../config.php');
session_start();
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;
$sql = "SELECT od.*, p.name AS product_name, p.price, p.image 
        FROM OrderDetails od
        JOIN Products p ON od.product_id = p.id
        WHERE od.order_id = $order_id";
$result = $con->query($sql);

$order_details = array();
if ($result->num_rows > 0) {
    // Duyệt qua các kết quả và đưa vào mảng
    while($row = $result->fetch_assoc()) {
        $order_details[] = $row;
    }
}

// Đóng kết nối
$con->close();

// Trả về dữ liệu dưới dạng JSON
echo json_encode($order_details);
?>