<header>
    <a href="home.php">
        <img src="../images/Logo_web.png" alt="PhoneZone">
    </a>
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['user_name'])) {
                $user_name = $_SESSION['user_name'];
                echo '<li><a href="./cart.php">Giỏ hàng</a></li>';
                echo '<li><a href="./your_order.php">Tra cứu đơn hàng</a></li>';
                echo '<li><a href="#">' . htmlspecialchars($user_name) . '</a></li>';
                echo '<li><a href="logout.php">Đăng xuất</a></li>';
            } else {
                echo '<li><a href="#" id="openLoginModal">Đăng nhập</a></li>';
                echo '<li><a href="./register.php">Đăng ký</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>

<?php include('./login.php'); ?>