<?php
include('../config.php');

$message = '';
//Login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
    } else {
        $message = 'Sai email hoặc mật khẩu';
    }
}
$isLoggedIn = isset($_SESSION['user_name']);
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
a {
    text-decoration: none;
    color: black;
}
</style>
<?php if (!$isLoggedIn): ?>
<style>
.header {
    display: flex;
    padding: 10px;
    height: 100px;
    justify-content: space-between;
    align-items: center;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-sizing: border-box;

}

.button-group {
    display: flex;
    gap: 30px;
}

.sign-up {
    padding: 10px 20px;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    background: linear-gradient(45deg, #e6e6e6, #a3a3a3, #1A2130);
    background-size: 300% 300%;
    animation: gradientAnimation 3s ease infinite;
    border-radius: 5px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    font-size: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-right: 40px;
}

.sign-up:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.sign-in {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: transparent;
    border: none;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
    margin-right: 20px;
}

i {
    margin-right: 5px;
    font-size: 20px;
}

.sign-in:hover {
    transform: scale(1.1);
}

@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}

.search {
    display: flex;
    height: 40px;
    margin-left: 200px;
    align-items: center;
    border: solid 1.5px black;
    border-radius: 50px;
    background-color: white;
    padding: 5px 10px;
    width: 300px;
    height: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.search .search-input {
    border: none !important;
    outline: none !important;
    font-size: 16px;
    flex: 1;
    margin-right: 10px;
    margin-bottom: 0;
    align-self: center;
    color: #000000;
    background: none;
    padding: 5px 0;
    /* Ensure proper vertical alignment */
    box-sizing: border-box;
    /* Prevent overflow issues */
}


.search-icon {
    background-color: transparent;
    border: none;
    color: black;
    cursor: pointer;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
    transition: transform 0.3s ease;
}

.search-icon:hover {
    transform: scale(1.1);
}
</style>
<!-- Header trước khi đăng nhập -->
<div class="header">
    <a href="./home.php"><img src="../images/logo_tachnen.png" width="70px" alt="Logo"></a>
    <div class="search">
        <input type="text" class="search-input" placeholder="Search...">
        <button class="search-icon"><i class='bx bx-search'></i></button>
    </div>
    <div class="button-group">
        <button class="sign-in" id="openLoginModal"><i class='bx bx-log-in'></i>ĐĂNG NHẬP</button>
        <a href="./register.php"><button class="sign-up">ĐĂNG KÝ</button></a>
    </div>
</div>
<?php else: ?>
<style>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    z-index: 1000;
    box-sizing: border-box;
    padding: 10px;
}

.button-group button {
    margin-left: 100px;
    margin-right: 20px;
    border: none;
    background-color: transparent;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    font-size: 15px;
    border-radius: 30px;
    padding: 10px 15px;
    transition: background-color 0.3s, color 0.3s;
    align-items: center;
    display: flex;
}

.button-group button:hover {
    background-color: black;
    color: white;
}

.sign-out {
    border: none;
    background-color: transparent;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    font-size: 15px;
    padding: 10px 15px;
    transition: background-color 0.3s, color 0.3s;
    border-radius: 30px;
    align-items: center;
    display: flex;
}

.sign-out:hover {
    background-color: black;
    color: white;
}

i {
    margin-right: 10px;
    font-size: 20px;
}

.button-group {
    display: flex;
}

.search {
    display: flex;
    height: 40px;
    margin-left: 50px;
    align-items: center;
    border: solid 1.5px black;
    border-radius: 50px;
    background-color: white;
    padding: 5px 10px;
    width: 300px;
    height: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.search .search-input {
    border: none !important;
    outline: none;
    margin-bottom: 0;
    flex: 1;
    margin-right: 10px;
    align-items: center;
    color: #000000;
    background: none;
}

.search-icon {
    background-color: transparent;
    border: none;
    color: black;
    cursor: pointer;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
    transition: transform 0.3s ease;
}

.search-icon:hover {
    transform: scale(1.1);
}
</style>
<!-- Header sau khi đăng nhập -->
<div class="header">
    <a href="./home.php"><img src="../images/logo_tachnen.png" width="70px" alt="Logo"></a>

    <div class="button-group">
        <a href="./cart.php"><button><i class='bx bx-shopping-bag'></i>Giỏ hàng</button></a>
        <a href="./your_order.php">
            <button><i class='bx bx-spreadsheet'></i>Tra cứu đơn hàng</button>
        </a>
        <button><i class='bx bxs-user-circle'></i><?php echo $_SESSION['user_name']; ?></button>
    </div>
    <div class="search">
        <input type="text" class="search-input" placeholder="Search...">
        <button class="search-icon"><i class='bx bx-search'></i></button>
    </div>
    <button class="sign-out" onclick="window.location.href='logout.php'"><i class='bx bx-log-out'></i>Đăng
        xuất</button>
</div>

<?php endif; ?>
<?php include('./login.php'); ?>
<script>
document.querySelector('.search-icon').addEventListener('click', function(e) {
    const searchValue = document.querySelector('.search-input').value;
    e.preventDefault();
    window.location.href = `product_by_search.php?search=${searchValue}`;
});
<?php
    if ($message != '') {
        echo "alert('$message');";
    }
    ?>
</script>