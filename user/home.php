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
        include('./header.php');
        ?>

        <div class="main-content">
            <div class="carousel">
                <img src="../images/banner1.png" alt="">
                <img src="../images/banner2.png" alt="">
                <div class="carousel-nav">
                    <div class="active"></div>
                    <div></div>
                </div>
            </div>
            <div class="brand-container">
                <div class="brand-item" id="get-all" data-id=""><img src="../images/all-icon.png"></div>
                <?php
            $brand_sql = "SELECT * FROM brands";
            $brand_result = $con->query($brand_sql);
        
            if ($brand_result->num_rows > 0) {
                while ($row = $brand_result->fetch_assoc()) {
                    echo '<div class="brand-item" data-id="' . $row["id"] . '"><img src="../images/phonesAndBrandsImages/' . $row["image"] . '"></div>';
                }
            } else {
                echo "0 results";
            }
            ?>
            </div>

            <div class="content-container">
                <div class="filter-container">
                    <h3>GIÁ</h3>
                    <ul>
                        <li>
                            <input type="radio" id="all" name="price" value="all" checked>
                            <label for="all">Tất cả</label>
                        </li>
                        <li>
                            <input type="radio" id="under-1m" name="price" value="0-10000000">
                            <label for="under-1m">Dưới 10,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="1m-2m" name="price" value="10000000-20000000">
                            <label for="10m-20m">10,000,000₫ - 20,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="2m-3m" name="price" value="20000000-30000000">
                            <label for="20m-30m">20,000,000₫ - 30,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="3m-4m" name="price" value="30000000-40000000">
                            <label for="30m-40m">30,000,000₫ - 40,000,000₫</label>
                        </li>
                        <li>
                            <input type="radio" id="over-4m" name="price" value="40000000-999999999">
                            <label for="over-40m">Trên 40,000,000₫</label>
                        </li>
                    </ul>
                </div>

                <div class="">
                    <div class="products" id="products">
                        <!-- Products will be loaded here via JavaScript -->
                    </div>

                    <div class="pagination" id="pagination">
                        <!-- Pagination links will be loaded here via JavaScript -->
                    </div>
                </div>

            </div>

        </div>



        <script src="../js/home.js">
        </script>

        <?php
        include('./footer.php');
        $con->close();
        ?>
    </body>


    </html>