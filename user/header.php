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
    <!-- <div class="search-bar">
        <form action="search.php" method="GET" class="search-container">
            <input type="text" name="query" placeholder="Search">
            <button type="submit" class="search-button">
                <img src="../images/kinhLupIcon.png" alt="Search">
            </button>
        </form>
    </div> -->
</header>

<?php
        include('./login.php');
    ?>