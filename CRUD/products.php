<?php
    // Nhúng file kết nối với mySQL vào trong read
    include 'connect.php';

    //Truy vấn danh sách các sản phẩm
    $query = "SELECT*FROM sanpham";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="css/read.css">
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="create.php">Thêm sản phẩm mới</a>
    <table>
        <tr>
            <td>ID </td>
            <td>Tên sản phẩm </td>
            <td>Mô tả </td>
            <td>Giá </td>
            <td>Hành động </td>
        </tr>
        <?php
        // Hiển thị danh sách sản phẩm từ csdl
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>";
            echo "<a href='update.php?id=" . $row['id'] . "'>Sửa</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "'>Xóa</a> ";
            //echo "<td>";
            echo "<tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Đóng kết nối
mysqli_close($conn);
?>