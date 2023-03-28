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
    <title>Giới Thiệu</title>
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
        <h3 class="text-danger text-center m-1 h3_after">CÁ CẢNH SHOP</h3>
        <br>
        <p style="font-size: 18px;">&nbsp &nbsp &nbsp &nbsp Hệ Thống Siêu Thị Cá Cảnh, Thủy Sinh, Cá Rồng, chuyên bán các loại cá cảnh nội và ngoại nhập,
            phụ kiện hồ cá, phụ kiện hồ thủy sinh, trang thiết bị nuôi cá cảnh, đặc biệc chúng tôi chuyên về cá rồng như
            <strong>  huyết long, kim long quá bối, cá rồng kim long, hồng long, thanh long, ngân long ....</strong> 
        </p>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/1.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/2.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/3.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/4.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá  </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/5.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/6.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <div class="text-center">
            <img class="img-fluid" src="img/gioithieu/7.jpg" width="600" height="350" alt="">
            <figcaption>Phụ kiện hồ cá </figcaption>
            <br>
        </div>
        <p style="font-size: 18px;"> &nbsp; &nbsp; &nbsp; &nbsp;  Ngoài bán các loại cá cảnh, thủy sinh, phụ kiện, chúng tôi còn cung cấp dịch vụ thiết kế, 
            thi công, hỗ trợ lắp đặt hồ cá rồng, hồ công nghệ mới, với giá tốt nhất trên thị trường, với phương châm uy tín, chất lượng tạo thương hiệu Hệ 
            Thống Siêu Thị Cá Cảnh, Thủy Sinh, Phụ Kiện Cá Rồng.
        </p>
        <p style="font-size: 18px;"> &nbsp; &nbsp; &nbsp; &nbsp; Khi đến với <strong class="text-danger">Hệ Thống Siêu Thị Cá Cảnh, Thủy Sinh</strong> quý khách thỏa sức chọn cho mình
             những chú cá cảnh mà mình yêu thích, các sản phẩm liên quan đến cá cảnh mà không cần lo ngại về giá cả.
        </p>
        <p style="font-size: 18px;">&nbsp; &nbsp; &nbsp;&nbsp; Sứ mệnh là mang đến mỗi gia đình một trải nghiệm tuyệt vời về thủy cảnh, mang lại một góc thư giãn tuyệt vời, đẳng cấp; là nơi để
             sum họp gia đình bạn bè chia sẻ yêu thương, góp phần xây dựng cuộc sống gia đình, xã hội giàu đẹp hơn.
        </p>
        <p style="font-size: 18px;">&nbsp; &nbsp; &nbsp;&nbsp; Quyết tâm xây dựng khẩu hiệu: <strong>"Tận Tâm - Tận Tình - Tận Tụy"</strong></p>
        <p style="font-size: 18px;"> <span class="text-primary">&nbsp; &nbsp; &nbsp;&nbsp; Đối với khách hàng</span> luôn lấy tiêu chí phục vụ khách hàng bằng tất cả những gì mình có; lấy  “uy tín” để tạo niềm tin;
            lấy giá trị trải nghiệm của khách hàng để nhận thành quả;
        </p>
        <h5 class="text-danger">Hệ Thống Siêu Thị Cá Cảnh, Thủy Sinh</h5>
        <p> <strong class="text-success">Chi Nhánh 1: </strong> <strong class="text-info">3/2, Ninh Kiều, Cần Thơ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0975 880 333</strong></p>
        <p>  <strong class="text-success">Chi Nhánh 2: </strong> <strong class="text-info"> 30/4 Ninh Kiều, Cần Thơ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0787 880 333</strong></p>
        <p>Website: <a class="text-info" href="https://cacanhshop.com">https://cacanhshop.com</a></p>
        <p>Email hổ trợ: <a class="text-info" href="hotro@cacanhshop.com"><strong>hotrocacanhshop@gmail.com</strong></a></p>
        <!--  -->
        <?php include 'footer.php' ?>         
    </div>
    <a href="#" class="nav-logo"></a>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script> 
</body>
</html>