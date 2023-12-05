<?php
include ('CRUD/connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <title>Shop Giày CTT</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>


    <!-- Example Code -->

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="san-pham.html">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="lien-he.html">Liên Hệ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gioi-thieu.html">Giới Thiệu</a>

                </li>
              </ul>
              <div class="d-flex">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm" >
                        <input type="text" class="form-control input-custom" placeholder="Search..." style="height: 38px;">
                        <div class="input-group-append" style="margin-right: 12px;">
                            <!-- Các phần tử bổ sung có thể thêm vào đây nếu cần -->
                            
                        </div>
                    </div>
                </form>
            
                <button type="button" class="btn btn-light text-dark me-2 border">
                    <a href="cart.html" class="text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 15 15">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </button>
            </div>
            
            <?php
            session_start(); // Bắt đầu phiên

            if (isset($_SESSION['user'])) { // Kiểm tra nếu có tên người dùng trong phiên
                $username = $_SESSION['user'];

                // Thực hiện truy vấn để lấy vai trò
                $query = "SELECT vai_tro FROM user WHERE username = '$username'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row) {
                        $vai_tro = $row['vai_tro'];
            ?>
                        <div class="dropdown">
                            <button class="btn btn-light text-dark me-2 border" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="#" class="text-decoration-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 15 15">
                                        <path d="M7.5 7.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5.194 6.741c-.933-1.05-2.154-1.566-3.694-1.566h-3.001c-1.54 0-2.761.516-3.694 1.566-.486.547-.911 1.232-.911 2.012h10.211c0-.78-.425-1.465-.911-2.012zM3.5 13c0-1.5 3-2.5 4.5-2.5s4.5 1 4.5 2.5H3.5z"/>
                                    </svg>
                                </a>
                            </button>
                            <ul class="dropdown-menu">
                                <li><span class="dropdown-item">Xin chào, <?php echo $username; ?></span></li>
                                <?php if ($vai_tro == 1) { // Kiểm tra vai_tro của người dùng là nhân viên ?>
                                    <li><a class="dropdown-item" href="admin.php">Quản trị admin</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item" href="CRUD/logout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                    <?php } else {
                        // Xử lý khi không có dữ liệu được trả về từ truy vấn
                        echo "Không có dữ liệu từ truy vấn.";
                    }
                } else {
                    // Xử lý khi có lỗi trong truy vấn SQL hoặc không có dữ liệu trả về
                    echo "Có lỗi trong truy vấn hoặc không có dữ liệu trả về.";
                }
            } else {
                ?>
                <div class="dropdown">
                    <button class="btn btn-light text-dark me-2 border" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="#" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 15 15">
                                <path d="M7.5 7.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5.194 6.741c-.933-1.05-2.154-1.566-3.694-1.566h-3.001c-1.54 0-2.761.516-3.694 1.566-.486.547-.911 1.232-.911 2.012h10.211c0-.78-.425-1.465-.911-2.012zM3.5 13c0-1.5 3-2.5 4.5-2.5s4.5 1 4.5 2.5H3.5z"/>
                            </svg>
                        </a>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="CRUD/login.php">Đăng Nhập</a></li>
                        <li><a class="dropdown-item" href="CRUD/register.php">Đăng Kí</a></li>
                    </ul>
                </div>
            <?php } ?>


            </div>
          </div>
        </nav>
    
    
        <marquee class="chay" behavior="scroll" direction="">
          Chương trình khuyến mãi diễn ra trong suốt từ ngày 11/11 đến ngày 31/11 !
    </marquee>
    <!-- Button trigger modal -->

  <!-- Modal -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/banner2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/banner2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/banner1.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    <main>
      <section class="section-specials padding-y border-bottom mt-5">

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <figure class="itemside">
                <div class="aside">
                  <span class="icon-sm rounded-circle bg-primary">
                    <i class="fa fa-money-bill-alt white"></i>
                  </span>
                </div>
                <figcaption class="info">
                  <h6 class="title">Giá cả hợp lý</h6>
                  <p class="text-muted">Chúng tôi cam kết cung cấp sản phẩm giá cả hợp lý </p>
                </figcaption>
              </figure> <!-- iconbox // -->
            </div><!-- col // -->
            <div class="col-md-4">
              <figure class="itemside">
                <div class="aside">
                  <span class="icon-sm rounded-circle bg-danger">
                    <i class="fa fa-comment-dots white"></i>
                  </span>
                </div>
                <figcaption class="info">
                  <h6 class="title">Hỗ trợ khách hàng 24/7 </h6>
                  <p class="text-muted">Luôn luôn sẵn sàng phục vụ khách hàng </p>
                </figcaption>
              </figure> <!-- iconbox // -->
            </div><!-- col // -->
            <div class="col-md-4">
              <figure class="itemside">
                <div class="aside">
                  <span class="icon-sm rounded-circle bg-success">
                    <i class="fa fa-truck white"></i>
                  </span>
                </div>
                <figcaption class="info">
                  <h6 class="title">Chuyển phát nhanh</h6>
                  <p class="text-muted">Giao hàng thần tốc - Giao hàng trong vòng 24h</p>
                </figcaption>
              </figure> <!-- iconbox // -->
            </div><!-- col // -->
          </div> <!-- row.// -->
  
        </div> <!-- container.// -->
      </section>
      <section class="specials-product">

      <div class= "container-fluid">
        <h1 class="text-center text-danger fw-bold">Bán Chạy</h1>
        <div class= "row">
          <div class ="col image">
             <div  class="border border-bottom-0 ">
               <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
             </div>
             <div class="btn-center">
               <button type="button" class="btn btn-success">Mua Ngay</button>
               <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
             </div>

          </div>
          <div class ="col image">
           <div  class="border border-bottom-0 ">
             <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
           </div>
             <button type="button" class="btn btn-success">Mua Ngay</button>
             <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
          </div>
          <div class ="col image">
           <div  class="border border-bottom-0 ">
             <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
           </div>
           <div class="btn-center">
             <button type="button" class="btn btn-success">Mua Ngay</button>
             <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
          </div>
       </div>
       <div class ="col image">
         <div  class="border border-bottom-0 ">
           <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
         </div>
         <div class="btn-center">
           <button type="button" class="btn btn-success">Mua Ngay</button>
           <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
        </div>
     </div>
     </div>
        <hr>
        <div class= "container-fluid">
          <h1 class="text-center text-danger fw-bold">FLash Sale</h1>
          <div class= "row">
             <div class ="col image">
                <div  class="border border-bottom-0 ">
                  <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
                </div>
                <div class="btn-center">
                  <button type="button" class="btn btn-success">Mua Ngay</button>
                  <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
                </div>
  
             </div>
             <div class ="col image">
              <div  class="border border-bottom-0 ">
                <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
              </div>
                <button type="button" class="btn btn-success">Mua Ngay</button>
                <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
             </div>
             <div class ="col image">
              <div  class="border border-bottom-0 ">
                <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
              </div>
              <div class="btn-center">
                <button type="button" class="btn btn-success">Mua Ngay</button>
                <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
             </div>
          </div>
          <div class ="col image">
            <div  class="border border-bottom-0 ">
              <img class="object-fit-fill border rounded" src="images/img1.jpg" alt="">
            </div>
            <div class="btn-center">
              <button type="button" class="btn btn-success">Mua Ngay</button>
              <button type="button" class="btn btn-danger">Thêm Vào Giỏ Hàng</button>
           </div>
        </div>
        </div>
</main>
<div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
      <div class="col mb-3">
        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
        <p class="text-body-secondary">&copy; 2023</p>
      </div>
  
      <div class="col mb-3">
  
      </div>
  
      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>
  
      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>
  
      <div class="col mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>
    </footer>
  </div>

  </body>
</html>