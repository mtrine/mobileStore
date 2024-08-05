<?php
include('../config.php');

// Pagination logic
$limit = 15; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Get selected price range from GET parameters
$price_range = isset($_GET['price']) ? $_GET['price'] : 'all';

// Build the price filter SQL condition
$price_condition = '';
if ($price_range != 'all') {
    list($min_price, $max_price) = explode('-', $price_range);
    $price_condition = "AND price BETWEEN $min_price AND $max_price";
}

// Get total number of products for pagination
$total_results_query = "SELECT COUNT(*) AS count FROM products WHERE 1=1 $price_condition";
$total_results = $con->query($total_results_query)->fetch_assoc()['count'];
$total_pages = ceil($total_results / $limit);

// Fetch products with price range filter
$product_sql = "SELECT * FROM products WHERE 1=1 $price_condition LIMIT $start, $limit";
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