<?php
    // Kết nối vào mySQL
    $servername = "localhost:3307";
    $username = "root"; //user vào mySQL
    $password = ""; //mật khẩu vào mySQL
    $dbname = "demo"; //cở sở dữ liệu lưu trữ bảng SanPham

    // Kết nối tới mySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn -> connect_error) {
        die ("Kết nối đến mySQL thất bại: " . $conn->connect_error);
    } else {
        //echo 'Thành công';
    }
    ?>