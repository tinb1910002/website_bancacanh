<?php 
session_start();
    include "./connect.php"; 
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $cartegory = $pdo-> query("select * from tbl_cartegory");
    $product = $pdo->query("select * from tbl_product");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.con" href="./img/logonho.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="bg-dark header">
            <div class="wrapper">
              <div class="logo">
                <div class="box_logo">
                  <a href="">
                    <img src="./img/logo_cacanh.gif" width="200px" height="150" alt="logo" style="filter:brightness(100.96%) ;">
                  </a>
                </div>
              </div>
              <div class="search_menu">
                <form action="timkiem.php?tukhoa=timkiem" class="form_search" method="POST" name="">
                  <input type="text" name="tukhoa"placeholder="Nhập từ khóa...">
                  <button class="btn btn-dark" type="submit"name="timkiem">
                    <img src="./img/search.png" width="" height="30" alt="">
                  </button>
                </form>
              </div>
              <div class="" style="margin: 0px 10px 90px 0px;">
                <div class="">
                  <a  href="dangnhap.php" class=" text-decoration-none " ></a>
                    <img src="./img/user.png" width="20px" height="20px" alt="">
                    <span class="text-primary"> 
                        <?php if (isset($user['email'])) {?>
                        <?php echo $user['name'] ?>
                        <a class="dropdown-toggle text-decoration-none " data-toggle="dropdown" href=""><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ><a class="dropdown-item" href="donhang.php" style=" font-weight: bold; color:red;">Đơn hàng</a></li>
                                <li ><a class="dropdown-item" href="dangxuat.php" style=" font-weight: bold; color:red;">Đăng xuất</a></li>
                            </ul> 
                                <?php }else {?>
                                    <a class="text-decoration-none" href="dangnhap.php"><span >Tài Khoản</span></a>
                                <?php } ?>  
                    </span>    
                </div>
                <div class="float-right">
                    <a class="text-decoration-none" href="view_giohang.php">
                    <img src="./img/shopping-cart.png" width="20px" height="20px" alt="">
                    <span>Giỏ hàng (<b><?php echo count($cart) ?></b>)</span>
                    </a>
                </div>
            </div>
          </div>
        </div>
        <nav class="row-cols-1 wrapper navbar " style="background: linear-gradient(to right, rgb(52, 97, 212) 0%, rgb(32, 5, 236) 100%);">
                <ul class="ul_nav ">
                    <li class="  " >
                        <a class="a_nav text-white text-decoration-none" href="trangchu.php">TRANG CHỦ</a>
                    </li>
                    <li  class=" ">
                        <a class="a_nav text-white text-decoration-none" href="gioithieu.php">GIỚI THIỆU</a>
                    </li>
                    <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="sanpham.php">SẢN PHẨM</a>
                    </li>

                    <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="tintuc.php">TIN TỨC</a>
                    </li>
                    <!-- <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="video.php">VIDEO</a>
                    </li> -->
                    <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="lienhe.php">LIÊN HỆ</a>
                    </li>
                </ul>
        </nav>   
        <!-- -->
        <br>
        <div class="title_main">
            <div class="title_h4">
                <h4>Tin Tức</h4>
                ::after==$0
            </div>
        </div>
        <div>
            <!-- letf -->
            <div class="row">
                <div class="col-6">
                    <div class="col-sm-5 float-left">
                        <a href="">
                            <img class="img-thumbnail" src="img/tintuc/mot_so_loai_phan_nen_cho_cay_thuy_sinh.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-7 float-right ">
                        <h5 class="text-primary"> <strong> Một số loại phân nền cao cấp chất lượng cho cây thủy sinh </strong></h5>
                        <p class="">Phân nền cao cấp có vai trò rất quan trọng đối với sự phát triển của cây thủy sinh, các loài động vật, vi sinh vật sống
                             <a href="">Đọc tiếp</a>
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-sm-5 float-left">
                        <a href="">
                            <img class="img-thumbnail" src="img/tintuc/tam-quan-trong-cua-may-bom-oxy-ho-ca-mini-khong-phai-ai-cung-biet.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-sm-7 float-right ">
                        <h5 class="text-primary"> <strong> Tầm quan trọng của máy bơm oxy hồ cá mini không phải ai cũng biết </strong></h5>
                        <p class="">Thú vui chơi cá cảnh ngày càng phát triển và nhận được sự yêu thích, quan tâm của đông đảo người chơi...
                        <a href="">Đọc tiếp</a>
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-sm-5 float-left">
                        <a href="">
                            <img class="img-thumbnail" src="img/tintuc/mua-ca-rong-va-nhung-dieu-can-biet.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-sm-7 float-right">
                        <h5 class="text-primary"><strong>Mua cá rồng và những điều cần biết</strong></h5>
                        <p class="overflow-auto">Cá rồng là một trong những loài cá mang vẻ đẹp độc đáo và mang ý nghĩa tâm linh,
                             mang lại vận may. Tuy nhiên, mua cá rồng cần lưu ý những gì, mua ở đâu uy...
                            <a href="">Đọc tiếp</a>
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-sm-5 float-left">
                        <a href="">
                            <img class="img-thumbnail" src="img/tintuc/cac-loai-thuoc-tri-benh-ngoai-da-cho-ca-hieu-qua.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-sm-7 float-right">
                        <h5 class="text-primary"><strong>Các loại thuốc trị bệnh cho cá hiệu quả</strong></h5>
                        <p class="overflow-auto">Khi tất cả các hoạt động từ ăn uống đến thải chất thải của cá cảnh đều được thực hiện trong
                             môi trường nước ...
                            <a href="">Đọc tiếp</a>
                        </p>
                    </div>
                </div>

            </div>
            <!--  -->
        </div>
        <br>
        <?php include 'footer.php' ?>       
    </div>
    <a href="#" class="nav-logo"></a>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>
