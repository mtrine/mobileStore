<?php
include('../config.php');

if (isset($_POST['brand_id'])) {
    $brand_id = mysqli_real_escape_string($con, $_POST['brand_id']);
    $price_range = isset($_POST['price']) ? mysqli_real_escape_string($con, $_POST['price']) : 'all';
    $limit = 16; // Số sản phẩm mỗi trang
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $start = ($page - 1) * $limit;

    // Lấy tổng số sản phẩm cho brand đã chọn với điều kiện giá
    $total_results_sql = "SELECT COUNT(*) AS count FROM products WHERE brand_id = '$brand_id'";
    if ($price_range != 'all') {
        $price_parts = explode('-', $price_range);
        $min_price = (float)$price_parts[0];
        $max_price = (float)$price_parts[1];
        $total_results_sql .= " AND price BETWEEN $min_price AND $max_price";
    }

    $total_results_result = $con->query($total_results_sql);

    if (!$total_results_result) {
        die('Lỗi truy vấn tổng số sản phẩm: ' . $con->error);
    }

    $total_results = $total_results_result->fetch_assoc()['count'];
    $total_pages = ceil($total_results / $limit);

    // Lấy sản phẩm theo trang và điều kiện giá
    $product_sql = "SELECT * FROM products WHERE brand_id = '$brand_id'";
    if ($price_range != 'all') {
        $product_sql .= " AND price BETWEEN $min_price AND $max_price";
    }
    $product_sql .= " LIMIT $start, $limit";

    $product_result = $con->query($product_sql);

    if (!$product_result) {
        die('Lỗi truy vấn sản phẩm: ' . $con->error);
    }

    $products = [];
    if ($product_result->num_rows > 0) {
        while ($row = $product_result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $response = [
        'total_pages' => $total_pages,
        'products' => $products
    ];

    header('Content-Type: application/json');
    echo json_encode($response);

    $con->close();
} else {
    // Trả về lỗi nếu không có `brand_id`
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Không có thông tin thương hiệu']);
}

?>