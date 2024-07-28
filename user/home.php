<?php
include('../config.php');
session_start(); // Đảm bảo session đã được bắt đầu

$message = '';
//Login
if(isset($_POST['login'])){
$email= mysqli_real_escape_string($con,$_POST['email']);
$pass= mysqli_real_escape_string($con,$_POST['password']);
$select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');
if(mysqli_num_rows($select_users)>0){
    $row=mysqli_fetch_assoc($select_users);
    $_SESSION['user_id']=$row['id'];
    $_SESSION['user_name']=$row['username'];
    $_SESSION['user_email']=$row['email'];
    header('location:home.php');
    exit();
}
else{
    $message = 'Sai email hoặc mật khẩu';
}
} 
//End Login
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneZone</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <?php
    include('../config.php');
    include('./header.php');
    ?>

    <div class="main-content">
        <div class="carousel">
            <img src="../images/PosterIphone15.jpg" alt="Iphone 15 Pro Max">
            <img src="../images/SSGalaxyUltraS23.jpg" alt="SamSung Galaxy S23 Ultra">
            <img src="../images/OppRenoF11.jpg" alt="Oppo Reno F11">
            <div class="carousel-nav">
                <div class="active"></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="brand-container">
        <?php
        $brand_sql = "SELECT * FROM brands";
        $brand_result = $con->query($brand_sql);

        if ($brand_result->num_rows > 0) {
            while ($row = $brand_result->fetch_assoc()) {
                echo '<div class="brand-item" data-id="' . $row["id"] . '"><img src="../images/Logo_Samsung.png"></div>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <div class="products" id="products">
        <!-- Products will be loaded here via JavaScript -->
    </div>

    <div class="pagination" id="pagination">
        <!-- Pagination links will be loaded here via JavaScript -->
    </div>

    <?php
    include('./footer.php');
    $con->close();
    ?>

    <script src="../js/home.js">
    </script>
    <script>
    <?php 
    if($message != ''){
    echo "alert('$message');";
    }
    ?>
    </script>

</body>

</html>