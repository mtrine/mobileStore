<?php
include('../config.php'); // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
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
            // Nếu upload thành công, thêm sản phẩm mới vào cơ sở dữ liệu
            $sql = "INSERT INTO Products (name, color, screen, operating_system, rear_camera, front_camera, cpu, ram, internal_storage, memory_card, battery_capacity, price, brand_id, image, created_at) 
                    VALUES ('$name', '$color', '$screen', '$operating_system', '$rear_camera', '$front_camera', '$cpu', '$ram', '$internal_storage', '$memory_card', '$battery_capacity', '$price', '$brand_id', '$image', NOW())";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }
} else {
    echo "Please select an image to upload.";
    exit;
}

// Thực hiện câu lệnh SQL
if ($con->query($sql) === TRUE) {
    echo "Product added successfully!";
} else {
    echo "Error adding product: " . $con->error;
}

// Đóng kết nối
$con->close();
?>