<?php
include('connect.php');
session_start();
$message = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username =$_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        if($row['password']==$password){
            $_SESSION["user"] = "$username";
            $_SESSION["vai_tro"]="$vai_tro";
            echo "<script>
                alert('Đăng nhập tài khoản thành công!');
                location.href='http://localhost:3000/index.php';
            </script>";
            
        } else {
            echo "Sai mật khẩu !! Vui lòng thử lại !";
        }
    } else {
        echo " Người dùng không tồn tại! ";
    }
    mysqli_close($conn);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">        
</head>
<body>
    <div class="container">
        <form action="<?php  echo $_SERVER["PHP_SELF"];  ?>" method="POST">
        <div class="row">
            <h2>LOGIN</h2>
        </div>
        <div class="row">
            <label> USER NAME : </label>
            <input type="text" name="username" id="username" placeholder="Enter Username" >
        </div>
        <div class="row">
            <label> PASSWORD</label>
            <input type="password" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="btn">
            <input type="submit" name="btn-regis" id="btn-regis" value="Login">
        </div>
        <div class="btn">
            <div id="message_line1" class="message"><?php   echo $message; ?></div>
        </div>
        Hoặc Đăng kí Tại đây: <a href = "register.php" tite = "register"> REGISTER.
        </form>
    </div>
</body>
</html>