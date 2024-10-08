<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/list-product.css">
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
    <div id="main-content-listProduct" class="main-content-listProduct">
        <h2>Danh sách sản phẩm</h2>
        <button id="delete-button" class="delete-product"><i class='bx bx-trash'></i>Xóa</button>
        <button id="update-button" class="update-product"><i class='bx bx-trash'></i>Cập nhật trạng thái</button>
        <hr>
        <div class="container">
            <table id="productTable">
                <tr>
                    <td class=" header">
                    </td>
                    <td class="header">ID sản phẩm</td>
                    <td class="header">Hình ảnh</td>
                    <td class="header">Tên sản phẩm</td>
                    <td class="header">Hãng</td>
                    <td class="header">Giá</td>
                    <td class="header"></td>

                </tr>

            </table>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
    <div id="confirmation-dialog" class="confirmation-dialog">
        <p>Bạn có chắc chắn muốn xóa người dùng này không?</p>
        <p class="warning-text">Bạn không thể hoàn tác hành động này</p>
        <button id="confirm-delete">Xóa</button>
        <button id="cancel-delete">Hủy</button>
    </div>
    <script src="../js/list-product.js"></script>
    <script src="../js/slidebar.js"></script>



</body>

</html>