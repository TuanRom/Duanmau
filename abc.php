<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Các thẻ head cần thiết -->
    <script>
        function loadContent(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    <style>
        /* Thêm CSS để thiết lập kích thước và vị trí cho phần hiển thị nội dung */
        #content {
            position: absolute;
            top: 0;
            right: 0;
            width: calc(100% - 250px); /* Điều chỉnh độ rộng cho phần nội dung */
            height: 100%;
            padding: 20px;
            overflow-y: auto;
            background-color: #f3f4f6;
            border-left: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <nav id="sidebar">
        <!-- Nội dung của sidebar -->
        <ul>
            <!-- Danh sách các mục trong sidebar -->
            <li><a href="javascript:void(0)" onclick="loadContent('CRUD/create.php')">Thêm sản phẩm</a></li>
            <!-- Thêm các mục sidebar khác -->
        </ul>
    </nav>

    <!-- Phần hiển thị nội dung -->
    <div id="content">
        <!-- Nội dung sẽ được tải ở đây -->
    </div>
</body>
</html>
