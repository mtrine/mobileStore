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
            <a href="user.php" data-target="user-management-content" class="user"><i class='bx bx-user'></i>Tài khoản
                người dùng</a>
            <a href="#product-management" class="toggle-submenu" data-target="product-management-content"
                class="product"><i class='bx bx-mobile-alt'></i>Sản phẩm<i class='bx bx-plus'></i></a>
            <div class="sub-menu" id="product-management-menu">
                <a href="add-product.php" data-target="add-product-content" class="add-product"><i
                        class='bx bxs-file-plus'></i>Thêm sản phẩm</a>
                <a href="list-product.php" data-target="list-product-content" class="list-product"><i
                        class='bx bx-list-ul'></i>Danh sách sản phẩm</a>
            </div>
            <a href="order.php" data-target="order-management-content" class="order"><i class='bx bxs-cart'></i>Đơn
                hàng</a>
            <a href="#sign-out" data-target="sign-out-content"><i class='bx bx-log-out'></i>Đăng xuất</a>
        </div>
    </div>
    <div class="main-content-orderDetail">
        <h2>Chi tiết đơn hàng</h2>
        <div class="order-detail">
            <div class="row">
                <p class="title">ID đơn hàng:</p>
                <p id="id">123-xyz</p>
            </div>
            <div class="row">
                <div class="deliver-information">
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Địa chỉ giao:</p>
                            <p id="address">02 Võ Oanh</p>
                        </div>
                        <div class="row">
                            <p class="title">Ngày đặt hàng:</p>
                            <p>2024-08-18</p>
                        </div>
                    </div>
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Số điện thoại:</p>
                            <p id="phone">0901234567</p>
                        </div>
                        <div class=" row">
                            <p class="title">Trạng thái:</p>
                            <p id="status">Đang giao</p>
                        </div>
                    </div>
                </div>
                <div class="customer-information">
                    <div class="row">
                        <p class="title">ID khách hàng:</p>
                        <p id="id-user">123-acb</p>
                    </div>
                    <div class="main-row">
                        <div class="row">
                            <p class="title">Tên khách hàng:</p>
                            <p id="username">Nguyễn Văn A</p>
                        </div>
                        <div class=" row">
                            <p class="title">Email:</p>
                            <p id="email">nguyenvana@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="main-title">Mặt hàng</p>
            <div class="row2">

            </div>
        </div>
    </div>
    <script src="../js/order-detail-admin.js"></script>
    <script src="../js/slidebar.js"></script>
</body>

</html>