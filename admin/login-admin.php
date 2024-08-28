<?php
include('../config.php'); // Đảm bảo session đã được bắt đầu
$message = '';
//Login
if(isset($_POST['login'])){
$email= mysqli_real_escape_string($con,$_POST['email']);
$pass= mysqli_real_escape_string($con,$_POST['password']);
$select_users = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');
if(mysqli_num_rows($select_users)>0){
    $row=mysqli_fetch_assoc($select_users);
    if($row['admin']==1){
        $_SESSION['user_id']=$row['id'];
        $_SESSION['user_name']=$row['username'];
        $_SESSION['user_email']=$row['email'];
        header('location:user.php');
        exit();
    }
    else{
        $message = 'Bạn không phải là admin';
    }
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
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="background"></div>

    <div class="overlay">
        <div class="login-container">
            <h2>Đăng nhập</h2>
            <?php if ($message): ?>
            <p><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label class="email">E-mail</label>
                    <input type="text" id="email" name="email" class="emailinput">
                </div>
                <div class="form-group">
                    <label class="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="passwordinput">
                </div>
                <button type="submit" name="login">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>

</html>