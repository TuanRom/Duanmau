<?php
include "connect.php";
// truy vấn danh sách các sản phẩm
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="css/viewpro.css">
    <style>
        img{
            width: 70px;
            height: 90px;
        }  
    </style>
</head>
<body>
    <h2>DANH SÁCH SẢN PHẨM</h2>
    <a href="addpro.php">Thêm sản phẩm mới</a><br></br>
    <table>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Hành động</th>
        </tr>
        <?php
        //hiển thị danh sách sản phẩm từ csdl
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><img src=".$row['image_url']."> </td>";
            echo "<td>" . $row['namepro'] . "</td>";
            echo "<td>";
            echo " <a href='deletepro.php?id=" . $row['id'] . "'>Xóa</a> ";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// đóng kết nối
mysqli_close($conn);
?>
