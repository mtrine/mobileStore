<?php
include('../config.php');

if (isset($_POST['brand_id'])) {
    $brand_id = mysqli_real_escape_string($con, $_POST['brand_id']);
    $limit = 15; // Số sản phẩm mỗi trang
    $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
    $start = ($page - 1) * $limit;

    // Lấy tổng số sản phẩm cho brand đã chọn
    $total_results_sql = "SELECT COUNT(*) AS count FROM products WHERE brand_id = '$brand_id'";
    $total_results = $con->query($total_results_sql)->fetch_assoc()['count'];
    $total_pages = ceil($total_results / $limit);

    // Lấy sản phẩm theo trang
    $product_sql = "SELECT * FROM products WHERE brand_id = '$brand_id' LIMIT $start, $limit";
    $product_result = $con->query($product_sql);

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
}
?>