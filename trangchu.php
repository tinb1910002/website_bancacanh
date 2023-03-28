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
    <title>Shop cá cảnh</title>
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
                    <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="lienhe.php">LIÊN HỆ</a>
                    </li>
                </ul>
        </nav>

        <div
            id="carousel-example-generic"
            class="carousel slide"
            data-interval="3000"
            data-ride="carousel"
            >
            <ul class="carousel-indicators">
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="0"
                    class="active"
                ></li>
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="1"
                    class=""
                ></li>
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="2"
                    class=""
                ></li>
                <!-- <li
                    data-target="#carousel-example-generic"
                    data-slide-to="3"
                    class=""
                ></li> -->
            </ul>
            <div class="carousel-inner ">
                <div class="carousel-item active">
                    <img class="img-fluid"
                        alt="First slide"
                        src="img/banner1.png"
                    />
                </div>
                <div class="carousel-item">
                    <img 
                        class="img-fluid"
                        alt="Second slide"
                        src="img/banner2.png"
                    />
                </div>
                <div class="carousel-item">
                    <img
                        class="img-fluid"
                        alt="Third slide"
                        src="img/banner3.jpg"
                    />
                </div>
                <!-- <div class="carousel-item">
                    <img
                        class="img-fluid"
                        alt="Third slide"
                        src="img/anh2.png"
                    />
                </div> -->
            </div>
            <!-- Controls -->
            <a
                class="carousel-control-prev"
                href="#carousel-example-generic"
                data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a
                class="carousel-control-next"
                href="#carousel-example-generic"
                data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>     
        </div>
        <br>
        <div>
            
            <div id="">
                <div class="">
                    <div class="title_main">
                        <div class="title_h4">
                            <h4>CÁ CẢNH</h4>
                            ::after==$0
                        </div>
                    </div>
                    <div
                        id="carousel-example-generic1"
                        class="carousel slide  "
                        data-interval="2500"
                        data-ride="carousel" >

                     <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="sanpham.php" class="thumbnail  ">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-ba-tuoc-nhap-sohal-tang.jpg" width="252px" height="200px" alt="img1"
                                            title="Cá Beta-Blue">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá Bá Tước">
                                            Cá Bá Tước
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">200,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="sanpham.php" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-bien-mao-tien-radiata-lionfish.jpg" width="252px" height="200px" alt="img2"
                                            title="Cá Cảnh Biển Trạng Nguyên Đỏ Red Scooter Dragonet">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá Cảnh Biển Mao Tiên">
                                            Cá Cảnh Biển Mao Tiên
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">300,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/huyet-fafu-35cm.jpg" width="252px" height="200px" alt="img3"
                                            title="Cá Rồng Huyết Long">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá Rồng Huyết Long">
                                            Cá Rồng Huyết Long
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">15,000,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-bien-ne-nhat-powder-blue-tang.jpg" width="253px" height="200px" alt="img4"
                                            title="Cá cảnh biển nẻ Nhật">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá dĩa bông xanh">
                                            Cá Cảnh Biển Nẻ Nhật
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">400,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="sanpham.php" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-bien-red-saddled-anthias.jpg" width="252px" height="200px" alt="img1"
                                            title="Cá cảnh biển red saddled anthias">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá Beta-Blue">
                                            Cá Cảnh Biển Red Saddled Anthias
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">500,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="sanpham.php" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-bien-than-yen-ngua-blue-girdled-angelfish.jpg" width="252px" height="200px" alt="img2"
                                            title="Cá cảnh biển thần yên ngựa">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá cảnh biển thần yên ngựa">
                                            Cá Cảnh Biển Thần Yên Ngựa
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">600,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-rong-kim-long-qua-boi-full-halmet.jpg" width="252px" height="200px" alt="img3"
                                            title="Cá rồng kim long quá bói">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá rồng kim long quá bói">
                                            Cá Rồng Kim Long Quá Bói
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">5,000,000</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/ca/ca-canh-bien-yellowtail-damselfish.jpg" width="253px" height="200px" alt="img4"
                                            title="Cá cảnh biển yellowtail damsefish">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cá dĩa bông xanh">
                                            Cá Cá Biển Yellowtail Damsefish
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">700,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        
                    </div>
                        <!-- Controls -->
                    <a class="carousel-control-prev"href="#carousel-example-generic1"data-slide="prev" style="margin-left:-95px; margin-top:-75px; ">
                        <span class="carousel-control-prev-icon bg-info "></span>
                    </a>
                    <a class="carousel-control-next"href="#carousel-example-generic1"data-slide="next" style="margin-right:-95px; margin-top:-75px; ">
                        <span class="carousel-control-next-icon bg-info"></span>
                    </a>     
                </div>
                </div>
                <!--  -->
                <div class="">
                    <div class="title_main">
                        <div class="title_h4">
                            <h4>THỨC ĂN CHO CÁ</h4>
                            ::after==$0
                        </div>
                    </div>
                     <div
                    id="carousel-example-generic2"
                    class="carousel slide"
                    data-interval="2500"
                    data-ride="carousel"
                    >
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/artemia-uht-thai-lan-thuc-an-thanh-trung-cong-nghe-cao.jpg" width="252px" height="200px" alt="img1">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden " title="Artemia">
                                            Artemia Thái Lan
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/thuc-an-cho-ca-betta-sakura-gold-35-20-gram.jpg" width="252px" height="200px" alt="img2">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thức ăn cho cá betta">
                                            Thức Cho Cá Betta
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/thuc-an-cho-ca-canh-jbl-novotab.jpg" width="252px" height="200px" alt="img3">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thức ăn cho cá cảnh">
                                            Thức Ăn Cho Cá Cảnh
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/thuc-an-cho-ca-dia-discus.jpg" width="253px" height="200px" alt="img4">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thức cho cá dĩa">
                                            Thức Ăn Cho Cá Dĩa
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/thuc-an-chuyen-dung-cho-ca-rong-inch-gold-hu-454gram.jpg" width="252px" height="200px" alt="img1">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden " title="Thức Ăn Chuyên Dụng Cho Cá Rồng INCH GOLD (Hủ 454Gram)">
                                            Thức Ăn Chuyên Dụng Cho Cá Rồng INCH GOLD (Hủ 454Gram)
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/thuc-an-quick-500g-ho-tro-len-mau-cho-ca-la-han.jpg" width="252px" height="200px" alt="img2">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thức ăn hổ trợ lên màu cho cá la hán">
                                            Thức Ăn Quick Hổ Trợ Lên Màu Cho Cá La Hán 
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/Thuc-an-Tetra-Color-Tropical-Granules.jpg" width="252px" height="200px" alt="img3">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thức ăn tetra color tropical granules">
                                            Thức Ăn Tetra Color Tropical Granules
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thucan/trun-huyet-dong-lanh-thuc-an-cho-ca-canh.jpg" width="253px" height="200px" alt="img4">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Trùng huyết đông lạnh">
                                            Trùng Huyết Đông Lạnh
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">100,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                    </div>
                        <!-- Controls -->
                    <a class="carousel-control-prev"href="#carousel-example-generic2"data-slide="prev" style="margin-left:-95px;margin-top:-75px; ">
                        <span class="carousel-control-prev-icon bg-info "></span>
                    </a>
                    <a class="carousel-control-next"href="#carousel-example-generic2"data-slide="next" style="margin-right:-95px; margin-top:-75px; ">
                        <span class="carousel-control-next-icon bg-info"></span>
                    </a>     
                </div>
                <!--  -->
                <div class="">
                    <div class="title_main">
                        <div class="title_h4">
                            <h4>HỒ CÁ VÀ PHỤ KIỆN HỒ CÁ</h4>
                            ::after==$0
                        </div>
                    </div>
                    <div
                    id="carousel-example-generic3"
                    class="carousel slide"
                    data-interval="2500"
                    data-ride="carousel"
                    >
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/ho-ca-rong-op-go-do.jpg" width="252px" height="200px" alt="img1"
                                            title="Hồ cá rồng ốp gỗ">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Hồ cá rồng ốp gỗ">
                                            Hồ Cá Rồng Ốp Gỗ
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">12,000,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/den-cao-cap-full-quang-pho-chuyen-dung-cho-ho-thuy-sinh.jpg" width="252px" height="200px" alt="img2" 
                                        title="Đèn led cao cấp full full quang phổ chuyên dùng cho hồ thủy sinh">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Đèn led cao cấp full quang phổ chuyên dùng cho hồ thủy sinh">
                                            Đèn Led Cao Cấp Full Quang Phổ Chuyên Dùng Cho Hồ Thủy Sinh
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">1,000,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/ho-ca-rong-op-go-xoai-son-trang.jpg" width="252px" height="200px" alt="img3"
                                             title="Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng">
                                            Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">15,000,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/den-led-chihiros-a-version-2.jpg" width="253px" height="200px" alt="img4"
                                            title="Đèn Led-Chihiros-A-Versiom-2">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Đèn Led-Chihiros-A-Versiom-2">
                                            Đèn Led-Chihiros-A-Version-2
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">450,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/cay-bon-size-cho-ho-thuy-sinh.jpg" width="252px" height="200px" alt="img1"
                                            title="Hồ cá rồng ốp gỗ">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Cấy Bon Size Cho Hồ Thủy Sinh">
                                            Cây Bon Size Cho Hồ Thủy Sinh
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">1,000,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/den-suoi-eheim-duc-300w.jpg" width="252px" height="200px" alt="img2" 
                                        title="Đèn led cao cấp full full quang phổ chuyên dùng cho hồ thủy sinh">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Đèn Sưởi Eheim Đức 300w ">
                                            Đèn Sưởi Eheim Đức 300w
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">300,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/ho-thuy-sinh-18.jpg" width="252px" height="200px" alt="img3"
                                             title="Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng">
                                            Hồ Cá Rồng Ôp Gỗ Xoài Sơn Trắng
                                        </h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">15,000,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/hoca_phukien/ho-thuy-sinh-loai-4-524.jpg" width="253px" height="200px" alt="img4"
                                            title="Đèn Led-Chihiros-A-Versiom-2">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Hồ Thủy Sinh">
                                            Hồ Thủy Sinh
                                        </h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">800,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        
                    </div>
                        <!-- Controls -->
                    <a class="carousel-control-prev"href="#carousel-example-generic3"data-slide="prev" style="margin-left:-95px; margin-top:-75px; ">
                        <span class=" carousel-control-prev-icon bg-info "></span>
                    </a>
                    <a class="carousel-control-next"href="#carousel-example-generic3"data-slide="next" style="margin-right:-95px; margin-top:-75px; ">
                        <span class="carousel-control-next-icon bg-info"></span>
                    </a>     
                </div>
                <!--  -->
                <div class="">
                    <div class="title_main">
                        <div class="title_h4">
                            <h4>THUỐC TRỊ BỆNH VÀ SẢN PHẨM BỔ TRỢ CHO CÁ</h4>
                            ::after==$0
                        </div>
                    </div>
                    <div
                    id="carousel-example-generic4"
                    class="carousel slide"
                    data-interval="2500"
                    data-ride="carousel"
                    >
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/thuoc-tri-nam.jpg" width="252px" height="200px" alt="img1">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thuốc trị nấm trắng">Thuốc trị nấm trắng</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">170,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/thuoc-tri-benh-xu-vay.jpg" width="252px" height="200px" alt="img2">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thuốc trị bệnh xù vảy">Thuốc trị bệnh xù vảy</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">200,000đ</span>
                                    </p>
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/thuoc-tri-nam-va-khuan-hai-api-melafix-273ml.jpg" width="252px" height="200px" alt="img3">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Thuốc trị nấm và khuẩn hại api melafix">Thuốc trị nấm và khuẩn hại api melafix</h6>
                                    </a>
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">300,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/bot-vitamin-c-mrbiofish-chuyen-dung-cho-ca-canh-120g.jpg" width="253px" height="200px" alt="img4">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Bột vitamin C chuyên dùng cho cá cảnh">Bột vitamin C chuyên dùng cho cá cảnh</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">170,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/men-vi-sinh.jpg" width="252px" height="200px" alt="img5">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Men vi sinh">Men vi sinh</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">170,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/prodac-arowana-elixir.jpg" width="252px" height="200px" alt="img6">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden">Prodac aorowana elixir</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">270,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/thuoc-mycine-dac-tri-lo-loet-thoi-vay-trang-duoi-o-ca.jpg" width="252px" height="200px" alt="img7">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden" title="Đặc trị lỡ loét thối vảy ở đuôi cá">Thuốc đặc trị lỡ loét thối vảy ở đuôi cá</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">170,000đ</span>
                                    </p> 
                                </div> 
                                <div class="col-md-3">
                                    <a href="" class="thumbnail">
                                        <img class="img-responsive" src="img/trangchu/thuoc/vitamin-refresh-duong-ca-cho-ca-canh.jpg" width="253px" height="200px" alt="img8">
                                        <h6 class="text-center text-body text-nowrap overflow-hidden">Vitamin cho cá cảnh</h6>
                                    </a> 
                                    <p class="text-center text-body">Giá:
                                        <span class="text-danger">170,000đ</span>
                                    </p> 
                                </div> 
                            </div>
                        </div>
                       
                    </div>
                        <!-- Controls -->
                    <a class="carousel-control-prev"href="#carousel-example-generic4"data-slide="prev" style="margin-left:-95px; margin-top:-75px; ">
                        <span class="carousel-control-prev-icon bg-info "></span>
                    </a>
                    <a class="carousel-control-next"href="#carousel-example-generic4"data-slide="next" style="margin-right:-95px; margin-top:-75px; ">
                        <span class="carousel-control-next-icon bg-info"></span>
                    </a>     
                </div>
                </div>
               
            </div>
            
        </div>
            <?php include "footer.php" ?>
 </div>
            <a href="#" class="nav-logo"></a>
            <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>  
</body>
</html>