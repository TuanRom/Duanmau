<?php
include ('CRUD/connect.php');
?>
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
            width: calc(100% - 292px); /* Điều chỉnh độ rộng cho phần nội dung */
            height: 100%;
            padding: 20px;
            overflow-y: auto;
            background-color: #f3f4f6;
            
        }
    </style>
</head>
<body>
<nav id="sidebar">
    <div class="sidebar-header">
        <a href="index.php">
            <img src="images/logo.png" alt="logo" class="img-fluid logo-small">
        </a>
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="index.php"><i class="fas fa-arrow-left"></i>Trở về web</a>
        </li>
        <!-- Danh mục -->
        <li>
            <a href="#" class="dropdown-toggle no-caret-down" onclick="toggleSubMenu('categories')">
                <i class="fas fa-list-alt"></i>Danh mục
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="categories">
                <li>
                    <a href="<?= $ADMIN_URL ?>/loai-hang/"><i class="fas fa-plus"></i>Thêm Danh Mục</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/loai-hang/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách danh mục</a>
                </li>
            </ul>
        </li>
        <!-- Sản phẩm -->
        <li>
            <a href="#" class="dropdown-toggle no-caret-down" onclick="toggleSubMenu('products')">
                <i class="fas fa-table"></i>Sản phẩm
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="products">
            <li><a href="javascript:void(0)" onclick="loadContent('CRUD/create.php')">Thêm sản phẩm</a></li>
            <li><a href="javascript:void(0)" onclick="loadContent('CRUD/products.php')">Danh sách sản phẩm</a></li>
            </ul>
        </li>
        <!-- Khách hàng -->
        <li>
            <a href="#" class="dropdown-toggle no-caret-down" onclick="toggleSubMenu('accounts')">
                <i class="fas fa-user-friends"></i>Khách hàng
                <i class="fas fa-angle-right float-xl-right"></i>
            </a>
            <ul class="collapse list-unstyled" id="accounts">
                <li>
                    <a href="<?= $ADMIN_URL ?>/khach-hang/"><i class="fas fa-plus"></i>Thêm khách hàng</a>
                </li>
                <li>
                    <a href="<?= $ADMIN_URL ?>/khach-hang/index.php?btn_list">
                        <i class="fas fa-list-ul"></i>Danh sách khách hàng</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= $ADMIN_URL ?>/thong-ke/"><i class="fas fa-chart-line"></i></i>Thống kê</a>
        </li>
        <li>
            <a href="<?= $ADMIN_URL ?>/don-hang/"><i class="fas fa-shipping-fast"></i></i>Đơn hàng</a>
        </li>
        <!-- <li>
            <a href="settings.html"><i class="fas fa-cog"></i>Cài đặt</a>
        </li> -->
    </ul>
</nav>
        <div id=content></div>

<style>
#sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #343a40;
    padding-top: 20px;
    color: #fff;
    transition: width 0.3s;
}

#sidebar:hover {
    width: 300px; /* Mở rộng sidebar khi di chuột qua */
}

#sidebar ul.components {
    padding: 0;
}

.sidebar-header {
    text-align: center;
}

.logo-small {
    width: 80px;
    height: auto;
}

#sidebar ul li {
    font-size: 16px;
    margin-bottom: 10px;
    position: relative;
}

#sidebar ul li a {
    padding: 15px;
    display: block;
    color: inherit;
    text-decoration: none;
    transition: background-color 0.3s;
}

#sidebar ul li a:hover {
    background-color: #555;
}

#sidebar ul li ul {
    position: relative; /* Đặt position là relative */
    left: 0;
    display: none;
    background-color: #343a40;
    padding-top: 10px;
    z-index: 1; /* Đặt z-index để menu phía dưới mức độ cao hơn */
}

#sidebar ul li:hover ul {
    display: block;
}

#sidebar ul li ul li {
    font-size: 14px;
    margin-left: 20px;
}

#sidebar ul li ul li a {
    padding: 10px;
    display: block;
    color: inherit;
    text-decoration: none;
    transition: background-color 0.3s;
}

#sidebar ul li ul li a:hover {
    background-color: #555;
}

#sidebar ul li i {
    margin-right: 10px;
}

#sidebar ul li ul li a i {
    margin-left: auto;
    display: block;
    transition: transform 0.3s ease-in-out;
}

#sidebar ul li ul li a[aria-expanded="true"] i {
    transform: rotate(-90deg);
}

</style>
<script>
var activeSubMenu = null; // Biến để theo dõi danh mục đang được mở

function toggleSubMenu(id) {
    var submenu = document.getElementById(id);
    
    // Nếu danh mục khác đang mở, đóng nó trước
    if (activeSubMenu && activeSubMenu !== submenu) {
        activeSubMenu.style.display = 'none';
    }

    // Mở hoặc đóng danh mục hiện tại
    if (submenu.style.display === 'block') {
        submenu.style.display = 'none';
        activeSubMenu = null; // Gán activeSubMenu về null khi đóng
    } else {
        submenu.style.display = 'block';
        activeSubMenu = submenu; // Gán activeSubMenu về submenu đang mở
    }
}

</script>