<?php
include('../config.php');
$sql="SELECT * FROM brands";
$result=$con->query($sql);

$brands= array();
if ($result->num_rows > 0) {
    // Duyệt qua các kết quả và đưa vào mảng
    while($row = $result->fetch_assoc()) {
        $brands[] = $row;
    }
}

// Đóng kết nối
$con->close();
echo json_encode($brands); 
?>