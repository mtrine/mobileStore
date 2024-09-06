<?php
include('../config.php');
session_start();

// Pagination logic
$limit = 16; // Number of products per page
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

// Get search keyword from GET parameters
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Get total number of products for pagination with search and price filters
$total_results_query = "SELECT COUNT(*) AS count FROM products WHERE name LIKE '%$search%' $price_condition";
$total_results = $con->query($total_results_query)->fetch_assoc()['count'];
$total_pages = ceil($total_results / $limit);

// Fetch products with search, price range filter, and pagination
$product_sql = "SELECT * FROM products WHERE name LIKE '%$search%' $price_condition LIMIT $start, $limit";
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