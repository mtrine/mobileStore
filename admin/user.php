<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/user.css">
    
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
    </div>
    <div id="main-content-user" class ="main-content-user">
        <h2>Danh sách người dùng</h2>
        <button id="delete-button" class="delete-user"><i class='bx bx-trash'></i>Xóa</button>
        <hr>
        <div class="container">
            <table>
                <tr>
                    <td class="header"><input class="all" type="checkbox"></td>
                    <td class="header">ID người dùng</td>
                    <td class="header">Họ tên người dùng</td>
                    <td class="header">Email</td>
                    <td class="header">Ngày tạo</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr><tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>123-xyz</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>21/02/2024</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Confirmation Dialog -->
    <div id="overlay" class="overlay"></div>
    <div id="confirmation-dialog" class="confirmation-dialog">
        <p>Bạn có chắc chắn muốn xóa người dùng này không?</p>
        <p class ="warning-text">Bạn không thể hoàn tác hành động này</p>
        <button id="confirm-delete">Xóa</button>
        <button id="cancel-delete">Hủy</button>
    </div>

    <script src="../js/user.js"></script>
    <script src="../js/slidebar.js"></script>    
</body>
</html>
