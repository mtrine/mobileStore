<?php
include('../config.php');

// Pagination logic
$limit = 15; // Số sản phẩm mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$total_results = $con->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];
$total_pages = ceil($total_results / $limit);

$product_sql = "SELECT * FROM products LIMIT $start, $limit";
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
?>