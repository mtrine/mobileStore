<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/order.css">
    
</head>
<body>
<body>
    
    <div class="slide-bar">
            <div class="logo">
                <img src="../images/Logo_web.png" width="100" height="100" alt="Logo">
            </div>
            <div class="option">
                <a href="user.php" data-target="user-management-content" class ="user"><i class='bx bx-user'></i>Tài khoản người dùng</a>
                <a href="#product-management" class="toggle-submenu" data-target="product-management-content" class="product"><i class='bx bx-mobile-alt'></i>Sản phẩm<i class='bx bx-plus'></i></a>
                <div class="sub-menu" id="product-management-menu">
                    <a href="add-product.php" data-target="add-product-content" class ="add-product"><i class='bx bxs-file-plus'></i>Thêm sản phẩm</a>
                    <a href="list-product.php" data-target="list-product-content" class ="list-product"><i class='bx bx-list-ul' ></i>Danh sách sản phẩm</a>
                </div>
                <a href="order.php" data-target="order-management-content" class ="order"><i class='bx bxs-cart'></i>Đơn hàng</a>
                <a href="#sign-out" data-target="sign-out-content"><i class='bx bx-log-out'></i>Đăng xuất</a>
            </div>
    </div>
    <div id="main-content-user" class ="main-content-order">
        <h2>Danh sách đơn hàng</h2>
        <div class = "top-button">
            <button id="delivering-button" class="delete-user"><i class='bx bx-trash'></i>Đổi trạng thái thành "Đang giao"</button>
            <button id="delivered-button" class="delete-user"><i class='bx bx-trash'></i>Đổi trạng thái thành "Giao thành công"</button>
        </div>
        <hr>
        <div class="container">
            <table>
                <tr>
                    <td class="header"><input class="all" type="checkbox"></td>
                    <td class="header">ID đơn hàng</td>
                    <td class="header">ID người dùng</td>
                    <td class="header">Địa chỉ giao</td>
                    <td class="header">Số điện thoại</td>
                    <td class="header">Trạng thái</td>
                    <td class ="header"></td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>456-abc</td>
                    <td>02 Võ Oanh Bình Thạnh</td>
                    <td>0123123123</td>
                    <td>Đang giao</td>
                    <td><button class ="see-detail" data-id="123-xyz">Xem chi tiết</button></td>
                </tr>

                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>456-abc</td>
                    <td>02 Võ Oanh Bình Thạnh</td>
                    <td>0123123123</td>
                    <td>Đang chuẩn bị hàng</td>
                    <td><button class ="see-detail" data-id="123-xyz">Xem chi tiết</button></td>
                </tr>
                
                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>456-abc</td>
                    <td>02 Võ Oanh Bình Thạnh</td>
                    <td>0123123123</td>
                    <td>Đang giao</td>
                    <td><button class ="see-detail" data-id="123-xyz">Xem chi tiết</button></td>
                </tr>
                
                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>456-abc</td>
                    <td>02 Võ Oanh Bình Thạnh</td>
                    <td>0123123123</td>
                    <td>Giao thành công</td>
                    <td><button class ="see-detail" data-id="123-xyz">Xem chi tiết</button></td>
                </tr>
                

                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>456-abc</td>
                    <td>02 Võ Oanh Bình Thạnh</td>
                    <td>0123123123</td>
                    <td>Đang giao</td>
                    <td><button class ="see-detail" data-id="123-xyz">Xem chi tiết</button></td>
                </tr>
                
                
            </table>
        </div>
    </div>

    <!-- Confirmation Dialog -->
    <div id="overlay" class="overlay"></div>
    <div id="confirmation-dialog" class="confirmation-dialog">
        <p>Bạn có chắc chắn muốn đổi trạng thái đơn hàng?</p>
        <p class ="warning-text">Bạn không thể hoàn tác hành động này</p>
        <button id="confirm">Xác nhận</button>
        <button id="cancel">Hủy</button>
    </div>

    <script src="../js/admin-order.js"></script>
    <script src="../js/slidebar.js"></script>    

</body>
</html>
