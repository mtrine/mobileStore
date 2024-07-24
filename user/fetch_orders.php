<?php
    include('../config.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql="SELECT * FROM orders WHERE id='$user_id'";
    $result=$con->query($sql);
    
    $orders= array();
    if ($result->num_rows > 0) {
        // Duyệt qua các kết quả và đưa vào mảng
        while($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }
    
    // Đóng kết nối
    $con->close();
    echo json_encode($orders); 
?>