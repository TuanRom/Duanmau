<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         echo "<script>
         alert('Đăng xuất tài khoản thành công!');
         location.href='http://localhost:3000/index.php';
        </script>"; 
        session_start();
        session_destroy();
    ?>
   
                                
</html>