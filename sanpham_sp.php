<?php
session_start();
    include "./connect.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $cartegory = $pdo-> query("select * from tbl_cartegory");
    $product = $pdo->query("select * from tbl_product");
    $sp = $pdo-> query ("select * from tbl_product where cartegory_id = " .$_GET['cartegory_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.con" href="./img/logonho.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.min.css">
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
                        <a  href="" class=" text-decoration-none" > </a>
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
                                    <a class="text-decoration-none" href="dangnhap.php"><span>Tài Khoản</span></a>
                                <?php } ?>  
                            </span>       
                    </div>
                    
                    <div class="float-right">
                        <a class="text-decoration-none" href="view_giohang.html">
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
                <li
                    data-target="#carousel-example-generic"
                    data-slide-to="3"
                    class=""
                ></li>
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
        <!-- san pham -->
        <br>    
        <section class="danhmuc" style="padding-bottom: 0; ">
        <div class="select " style="width: 15rem;margin:10px; ">
            <div class="select_form" aria-label="Default select example" style="padding: 0rem; font-size: 23px;border: 1px solid black;">     
                <select class="overflow-hidden" onchange="location = this.value;" style="width: 14.6rem; height:3rem;">
                    <option  value="sanpham.php">Tất cả sản phẩm</option>
                    <?php foreach ($cartegory as $key => $value) : 
                        if ($value['cartegory_id'] == $_GET['cartegory_id']) { ?>
                            <option selected value="sanpham_sp.php?cartegory_id=<?php echo $value['cartegory_id'] ?>"><?php echo $value['cartegory_name']?></option>
                        <?php } else { ?>
                            <option value="sanpham_sp.php?cartegory_id=<?php echo $value['cartegory_id'] ?>"><?php echo $value['cartegory_name']?></option>
                        <?php } ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </section>
    <section class="categories" id="">              
            <div class="box-container">
                <?php foreach ($sp as $key => $value) : ?>
                    <div class="box">
                        <div product_id=<?php echo $value['product_id'] ?>>
                        <img src="./admin/uploads/<?php echo $value['product_img']?>"> 
                    </div>
                        <h3 class="text-nowrap overflow-hidden" title="<?php echo $value['product_name'] ?>"><?php echo $value['product_name'] ?></h3>
                        <p>Số lượng: <?php echo $value['product_quantity'] ?> </p>
                        <br>                   
                        <p><?php echo number_format($value['product_price'])  ?><sup>đ</sup></p>
                        <br>
                        <a href="giohang.php?product_id=<?php echo $value['product_id'] ?>" &action="add" class="btn btn-danger">Thêm vào giỏ hàng</a>
                    </div>
                <?php endforeach ?>
            </div>
    </section>
    <br>
        <!--  -->
        <?php include 'footer.php' ?>        
    </div>
    <a href="#" class="nav-logo"></a>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>