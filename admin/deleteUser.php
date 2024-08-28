<?php
include('../config.php');
if (isset($_POST['id'])) {
$delete_id = mysqli_real_escape_string($con, $_POST['id']);

// Thực hiện truy vấn xóa người dùng
$delete_query = "DELETE FROM Users WHERE id = '$delete_id'";
if (mysqli_query($con, $delete_query)) {
$response = ['status' => 'success', 'message' => 'Người dùng đã được xóa.'];
} else {
$response = ['status' => 'error', 'message' => 'Xóa người dùng không thành công.'];
}

// Đóng kết nối và trả về phản hồi JSON
mysqli_close($con);
echo json_encode($response);
exit(); // Dừng thực thi mã sau khi trả về phản hồi
}