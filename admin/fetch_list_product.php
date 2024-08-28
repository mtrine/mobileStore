<?php
include('../config.php');
$sql = "select p.* ,b.name as brand_name 
from products p ,brands b 
where p.brand_id=b.id";
$result = $con->query($sql);

$products = array();
if ($result->num_rows > 0) {
    // Duyệt qua các kết quả và đưa vào mảng
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Đóng kết nối
$con->close();
echo json_encode($products);