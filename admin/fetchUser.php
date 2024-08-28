<?php
include('../config.php');
$sql="SELECT * FROM users";
$result=$con->query($sql);

$users= array();
if ($result->num_rows > 0) {
    // Duyệt qua các kết quả và đưa vào mảng
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Đóng kết nối
$con->close();
echo json_encode($users); 
?>