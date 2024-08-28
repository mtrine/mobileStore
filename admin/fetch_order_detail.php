<?php
include('../config.php');
$id = $_GET['id'];
$sql = "SELECT 
    Orders.id AS order_id,
    Orders.status,
    Orders.address,
    Orders.phoneNumber ,
    Orders.created_at,
    Users.username,
    Users.id as user_id,
    Users.email,
    Products.name AS product_name,
    Products.price AS product_price,
    Products.image AS product_image,
    OrderDetails.quantity,
    (OrderDetails.quantity * Products.price) AS total_price_per_product
FROM 
    Orders
JOIN 
    Users ON Orders.user_id = Users.id
JOIN 
    OrderDetails ON Orders.id = OrderDetails.order_id
JOIN 
    Products ON OrderDetails.product_id = Products.id
WHERE 
    Orders.id = $id";

$result=$con->query($sql);
$ordersDetail= array();
if ($result->num_rows > 0) {
    // Duyệt qua các kết quả và đưa vào mảng
    while($row = $result->fetch_assoc()) {
        $ordersDetail[] = $row;
    }
}

// Đóng kết nối
$con->close();
echo json_encode($ordersDetail); 
?>