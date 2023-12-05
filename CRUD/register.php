<?php
include('connect.php');
// Xử lý yêu cầu đăng kí khi đẩy form
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // lấy thông tin từ form
    $username =$_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    

    // kiểm tra người dùng đã tồn tại

    $check_query = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($check_query);

    if($result->num_rows>0){
        $message = "Tài khoản đã được đăng kí";
    }else {
        //thêm tài khoản vào csdl
        $insert_query = " INSERT INTO user(username, password, email) VALUES ('$username' , '$password' , '$email')";
        if ($conn -> query($insert_query)===TRUE) {
            $message = "Thành công";
        }else{
            $message = "Thất bại";
        }
    }
}
    
    //đóng kết nối
    mysqli_close($conn);


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
            <h2>REGISTER</h2>
        </div>
        <div class="row">
            <label> USER NAME : </label> <br>
            <input type="text" name="username" id="username" placeholder="Enter Username" >
        </div>
        <div class="row">
            <label> EMAIL</label> <br>
            <input type="text" name="email" id="email" placeholder="Enter Email">
        </div>
        <div class="row">
            <label> PASSWORD</label> <br>
            <input type="password" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="row">
            <label> CONFIRM PASSWORD</label> <br>
            <input type="password" name="confirm" id="confirm" placeholder="Confirm Password">
        </div>
        <div class="btn">
            <input type="submit" name="btn-regis" id="btn-regis" value="REGISTER">
        </div>
        <div class="row">
            <div id="message_line1" class="message"><?php   echo $message; ?></div>
        </div>
        Hoặc đăng nhập tại đây: <a href = "login.php" tite = "register"> ĐĂNG NHẬP.
        </form>
    </div>
</body>
</html>