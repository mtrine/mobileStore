<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/order-detail.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="slide-bar">
        <div class="logo">
            <img src="../images/Logo_web.png" width="100" height="100" alt="Logo">
        </div>
        <div class="option">
            <a href="user.php" data-target="user-management-content" class="user"><i class='bx bx-user'></i>Tài khoản người dùng</a>
            <a href="#product-management" class="toggle-submenu" data-target="product-management-content" class="product"><i class='bx bx-mobile-alt'></i>Sản phẩm<i class='bx bx-plus'></i></a>
            <div class="sub-menu" id="product-management-menu">
                <a href="add-product.php" data-target="add-product-content" class="add-product"><i class='bx bxs-file-plus'></i>Thêm sản phẩm</a>
                <a href="list-product.php" data-target="list-product-content" class="list-product"><i class='bx bx-list-ul'></i>Danh sách sản phẩm</a>
            </div>
            <a href="order.php" data-target="order-management-content" class="order"><i class='bx bxs-cart'></i>Đơn hàng</a>
            <a href="#sign-out" data-target="sign-out-content"><i class='bx bx-log-out'></i>Đăng xuất</a>
        </div>
    </div> 
    <div class="main-content-orderDetail">
        <h2>Chi tiết đơn hàng</h2>
        <div class="order-detail">
            <div class="row">
                <p class="title">ID đơn hàng:</p>
                <p>123-xyz</p>
            </div>
            <div class="row">
                <div class="deliver-information">
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Địa chỉ giao:</p>
                            <p>02 Võ Oanh</p>
                        </div>
                        <div class="row">
                            <p class="title">Ngày đặt hàng:</p>
                            <p>2024-08-18</p>
                        </div>
                    </div>
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Số điện thoại:</p>
                            <p>0901234567</p>
                        </div>
                        <div class="row">
                            <p class="title">Trạng thái:</p>
                            <p>Đang giao</p>
                        </div>
                    </div>
                </div>
                <div class="customer-information">
                    <div class="row">
                        <p class="title">ID khách hàng:</p>
                        <p>123-acb</p>
                    </div>
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Tên khách hàng:</p>
                            <p>Nguyễn Văn A</p>
                        </div>
                        <div class="row">
                            <p class="title">Email:</p>
                            <p>nguyenvana@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="main-title">Mặt hàng</p>
            <div class="row2">
                <div class="product-item">
                    <div>

                    </div>
                    <div class="row">
                        <img src="../images/iphone15.png" class="product-image" alt="Product Image">
                        <div class="product-info">
                            <div class="row">
                                <p class="product-name">Tên sản phẩm</p>
                            </div>
                            <div class="row">
                                <p class ="amount">Số lượng:</p>
                                <p class ="amount-number">2</p>
                            </div>
                            <p class="title">123000 VND</p>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div>

                    </div>
                    <div class="row">
                        <img src="../images/iphone15.png" class="product-image" alt="Product Image">
                        <div class="product-info">
                            <div class="row">
                                <p class="product-name">Tên sản phẩm</p>
                            </div>
                            <div class="row">
                                <p class ="amount">Số lượng:</p>
                                <p class ="amount-number">2</p>
                            </div>
                            <p class="title">123000 VND</p>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div>

                    </div>
                    <div class="row">
                        <img src="../images/iphone15.png" class="product-image" alt="Product Image">
                        <div class="product-info">
                            <div class="row">
                                <p class="product-name">Tên sản phẩm</p>
                            </div>
                            <div class="row">
                                <p class ="amount">Số lượng:</p>
                                <p class ="amount-number">2</p>
                            </div>
                            <p class="title">123000 VND</p>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div>

                    </div>
                    <div class="row">
                        <img src="../images/iphone15.png" class="product-image" alt="Product Image">
                        <div class="product-info">
                            <div class="row">
                                <p class="product-name">Tên sản phẩm</p>
                            </div>
                            <div class="row">
                                <p class ="amount">Số lượng:</p>
                                <p class ="amount-number">2</p>
                            </div>
                            <p class="title">123000 VND</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/order-detail.js"></script>
    <script src="../js/slidebar.js"></script>  
</body>
</html>
