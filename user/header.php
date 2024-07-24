<header>
    <a href="home.php">
        <img src="../images/Logo_web.png" alt="PhoneZone">
    </a>
    <nav>
        <?php
        if (isset($_SESSION['user_name'])) {
            $user_name = $_SESSION['user_name'];
            echo '<a href="./cart.php">Giỏ hàng</a>';
            echo '<a href="./your_order.php">Tra cứu đơn hàng</a>';
            echo "<a href='#'>$user_name</a>";
            echo '<a href="logout.php">Đăng xuất</a>';
        } else {
            echo '<a href="#" id="openLoginModal">Đăng nhập</a>';
            echo '<a href="./register.php" >Đăng ký</a>';

        }
        ?>
    </nav>
    <div class="search-bar">
        <input type="text" placeholder="Search">
        <input type="submit" value="Search">
    </div>
</header>