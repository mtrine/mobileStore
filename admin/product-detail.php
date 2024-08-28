<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/product-detail.css">
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
    <div class="main-content-product-detail" style="flex-grow: 1; padding: 20px;">
        <p class="main-title">Thông tin sản phẩm</p>
        <div class="row1">
            <div class="column1">
                <div class="general-information">
                    <p class="title">Thông tin chung</p>
                    <div class="row">
                        <p>ID sản phẩm:</p>
                        <p id="id">123-xyz</p>
                    </div>
                    <div class="row">
                        <p>Tên sản phẩm</p>
                        <input type="text" id="product-name">
                    </div>
                    <div class="row">
                        <p>Màu sắc</p>
                        <input type="text" id="color">
                    </div>
                    <div class="row">
                        <p>Màn hình</p>
                        <input type="text" id="screen">
                    </div>
                    <div class="row">
                        <p>Hệ điều hành</p>
                        <input type="text" id="os">
                    </div>
                    <div class="row">
                        <p>Camera sau</p>
                        <input type="text" id="rear-camera">
                    </div>
                    <div class="row">
                        <p>Camera trước</p>
                        <input type="text" id="front-camera">
                    </div>
                    <div class="row">
                        <p>CPU</p>
                        <input type="text" id="cpu">
                    </div>
                    <div class="row">
                        <p>RAM</p>
                        <input type="text" id="ram">
                    </div>
                    <div class="row">
                        <p>Bộ nhớ trong</p>
                        <input type="text" id="internal-memory">
                    </div>
                    <div class="row">
                        <p>Thẻ nhớ</p>
                        <input type="text" id="sd-card">
                    </div>
                    <div class="row">
                        <p>Dung lượng pin</p>
                        <input type="text" id="battery">
                    </div>
                </div>
            </div>
            <div class="column2">
                <div class="brand">
                    <p class="title">Hãng điện thoại</p>
                    <div class="row">
                        <label for="brands">Chọn hãng điện thoại:</label>
                        <select id="brands" name="brands">

                        </select>
                    </div>
                </div>
                <div class="price">
                    <p class="title">Giá tiền</p>
                    <div class="row">
                        <p> Giá tiền sản phẩm </p>
                        <input type="number" id="price" step="100000">
                    </div>
                </div>
                <div class="upload-button">
                    <img id="selected-image">
                    <input type="file" id="file-input" accept="image/*">
                </div>
            </div>
        </div>
        <div class="button-bottom-page">
            <button class="return" id="return">Quay về</button>
            <button id="edit-product-button">Thay đổi</button>
        </div>
    </div>

    <div id="overlay" class="overlay"></div>
    <div id="confirmation-dialog" class="confirmation-dialog">
        <p>Chắc chắn muốn thay đổi thông tin sản phẩm?</p>
        <button id="confirm-edit">Thay đổi</button>
        <button id="cancel-edit">Quay lại</button>
    </div>
    <script src="../js/product-detail.js"></script>

</body>

</html>