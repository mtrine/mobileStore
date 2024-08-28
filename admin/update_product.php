<?php
include('../config.php'); // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$id =  $_GET['id'];
$name = mysqli_real_escape_string($con, $_POST['name']);
$color = mysqli_real_escape_string($con, $_POST['color']);
$screen = mysqli_real_escape_string($con, $_POST['screen']);
$operating_system = mysqli_real_escape_string($con, $_POST['operating_system']);
$rear_camera = mysqli_real_escape_string($con, $_POST['rear_camera']);
$front_camera = mysqli_real_escape_string($con, $_POST['front_camera']);
$cpu = mysqli_real_escape_string($con, $_POST['cpu']);
$ram = mysqli_real_escape_string($con, $_POST['ram']);
$internal_storage = mysqli_real_escape_string($con, $_POST['internal_storage']);
$memory_card = mysqli_real_escape_string($con, $_POST['memory_card']);
$battery_capacity = mysqli_real_escape_string($con, $_POST['battery_capacity']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$brand_id = mysqli_real_escape_string($con, $_POST['brand_id']);

// Xử lý upload file ảnh
$image = $_FILES['image']['name'];
$target_dir = "../images/phonesAndBrandsImages/"; // Đường dẫn thư mục lưu ảnh (cần kiểm tra quyền ghi)
$target_file = $target_dir . basename($image);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Kiểm tra file đã được upload chưa
if (!empty($image)) {
    // Chỉ cho phép các định dạng ảnh nhất định
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($imageFileType, $allowed_types)) {
        // Upload file ảnh lên server
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Nếu upload thành công, tiếp tục cập nhật sản phẩm trong cơ sở dữ liệu
            $sql = "UPDATE Products SET
                name='$name',
                color='$color',
                screen='$screen',
                operating_system='$operating_system',
                rear_camera='$rear_camera',
                front_camera='$front_camera',
                cpu='$cpu',
                ram='$ram',
                internal_storage='$internal_storage',
                memory_card='$memory_card',
                battery_capacity='$battery_capacity',
                price='$price',
                brand_id='$brand_id',
                image='$image',
                updated_at=NOW()
            WHERE id='$id'";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }
} else {
    // Nếu không có file ảnh được upload, không cập nhật trường `image`
    $sql = "UPDATE Products SET
        name='$name',
        color='$color',
        screen='$screen',
        operating_system='$operating_system',
        rear_camera='$rear_camera',
        front_camera='$front_camera',
        cpu='$cpu',
        ram='$ram',
        internal_storage='$internal_storage',
        memory_card='$memory_card',
        battery_capacity='$battery_capacity',
        price='$price',
        brand_id='$brand_id',
        updated_at=NOW()
    WHERE id='$id'";
}

// Thực hiện câu lệnh SQL
if ($con->query($sql) === TRUE) {
    echo "Product updated successfully!";
} else {
    echo "Error updating product: " . $con->error;
}

// Đóng kết nối
$con->close();
?>