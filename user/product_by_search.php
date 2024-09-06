<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php
    include('../config.php');
    session_start();
    include('./header.php');

    // Get search keyword from GET parameters
    $search_keyword = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
    ?>
    <div id="main-content">
        <div class="content-container">
            <!-- Dynamically insert the search keyword here -->
            <div class="filter-container">
                <h5>Bạn đang tìm kiếm với từ khóa "<?php echo $search_keyword; ?>"</h1>
                    <h3>GIÁ</h3>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="price" value="all" checked>
                            <label for="all">Tất cả</label>
                        </li>
                        <li>
                            <input type="radio" id="under-1m" name="price" value="0-10000000">
                            <label for="under-1m">Dưới 10,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="1m-2m" name="price" value="10000000-20000000">
                            <label for="10m-20m">10,000,000₫ - 20,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="2m-3m" name="price" value="20000000-30000000">
                            <label for="20m-30m">20,000,000₫ - 30,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="3m-4m" name="price" value="30000000-40000000">
                            <label for="30m-40m">30,000,000₫ - 40,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="over-4m" name="price" value="40000000-999999999">
                            <label for="over-40m">Trên 40,000,000₫</label>
                        </li>
                    </ul>
            </div>

            <div class="">
                <div class="products" id="products">
                    <!-- Products will be loaded here via JavaScript -->
                </div>

                <div class="pagination" id="pagination">
                    <!-- Pagination links will be loaded here via JavaScript -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/product_by_search.js"></script>

</html>