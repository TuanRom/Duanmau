<?php
    // Khởi tạo biến session
    session_start();
    // Kiểm tra xem sessionuser có tồn tại không
    if(isset($_SESSION["user"])) {
?>
Welcome <?php echo $_SESSION["user"]; ?>.
Nháy chuột vào đây để thoát ra <a href="logout.php" tite="Logout">Logout.
<?php 
    } else echo "<a href='login.php' tite='Login'> Vui lòng đăng nhập </a>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <div class="container">
        <h1>Đây là trang product hoặc category của bạn</h1>
    </div>
</body>
</html>