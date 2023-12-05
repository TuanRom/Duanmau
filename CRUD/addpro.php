<?php
include 'connect.php';
//kiểm tra form đã dc submit hay chưa
if (isset($_POST['submit'])) {
    //lấy tên sản phẩm từ form
    $namepro = $_POST['namepro'];
    $target_dir = "upload/";
    // đường dẫn đến thư mực lưu trữ file
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // gán trạng thái upload file = 1 (thành công)
    $uploadOk = 1;
    // lấy định dạng ảnh
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // kiểm tra xem file đã tồn tại hay chưa
    if (file_exists($target_file)) {
        echo "File đã tồn tại.";
        // bật tráng thái khi file lỗi
        $uploadOk = 0;
    }
    //kiểm tra kích thước file
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File quá lớn.";
        $uploadOk = 0;
    }
    //kiểm tra định dạng file
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
        echo "Chỉ chấp nhận file JPG, PNG, JPEG và GIF.";
        $uploadOk = 0;
    }
    // kiểm tra nếu uploadOK = 0, tức là có lỗi xảy ra
    if($uploadOk == 0){
        echo "Tập tin không được tải lên";
    }else{
        // di chuyển file từ thư mục tạm lên thư mục chính
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
            // lấy địa chỉ ảnh sau khi upload anh thành công
            $path = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            // chèn vào bảng product trong csdl test
            $query = "INSERT INTO product (namepro, image_url) VALUES ('$namepro', '$path')";
           $result = mysqli_query($conn, $query);
           // kiểm tra kêt quả truy vấn
           if ($result) {
                echo "Thêm sản phẩm thành công.";
           }else{
                echo "Có lỗi xãy ra" . mysqli_error($conn);
           }
        }else{
            echo "Có lỗi xảy ra khi tải lên file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addpro.css">
</head>
<body>
    <a href="viewpro.php">DANH SÁCH SẢN PHẨM</a><br>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        Name <input type="text" name="namepro" id="namepro"><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Upload file" name="submit">
    </form>
</body>
</html>