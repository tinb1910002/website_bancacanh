<?php 
session_start();
    include "./connect.php"; 
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $cartegory = $pdo->query("select * from tbl_cartegory");
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
                                <li ><a class="dropdown-item" href="" style=" font-weight: bold; color:red;">Đơn hàng</a></li>
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
        <section style="padding-top: 50px ;">
        <div class="">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 box-heading-contact">
                    <div class="box-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.539668725765!2d105.73920041456772!3d10.054792074847793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089c60644ffc3%3A0x9d9e60f00818d60a!2zU2hvcCBDw6EgQ-G6o25oIFN1biBDxrDhu51uZw!5e0!3m2!1sen!2s!4v1667928907453!5m2!1sen!2s" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12  wrapbox-content-page-contact">
                    <div class="header-page-contact clearfix">
                        <h1>Liên hệ</h1>
                    </div>
                    <div class="box-info-contact">
                        <ul class="list-info">
                            <li>
                                <p>Địa chỉ chúng tôi</p>
                                <p><strong>Khu dân cư 586 Cái Răng, Cần Thơ, Việt Nam
                                </strong></p>
                            </li>
                            <li>
                                <p>Email chúng tôi</p>
                                <p><strong>shopcacanh@gmail.com</strong></p>
                            </li>
                            <li>
                                <p>Điện thoại</p>
                                <p><strong>+84 237 683 252</strong></p>
                                <p><strong>+84 237 683 363</strong></p>
                            </li>
                        </ul>
                    </div>
                    <div class="box-send-contact">
                        <h2>Gửi thắc mắc cho chúng tôi</h2>
                        <div id="col-left contactFormWrapper menuList-links">
                            <form accept-charset="UTF-8" action="/contact" class="contact-form" method="post">
                                <div class="contact-form">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Tên của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Email của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input required="" type="text" class="form-control" placeholder="Số điện thoại của bạn">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="input-group">
                                                <textarea placeholder="Nội dung"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-secondary btn-lg">Gửi cho chúng tôi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>           
    <?php include 'footer.php' ?>   
 </div>
            <a href="#" class="nav-logo"></a>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>