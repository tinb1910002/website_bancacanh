<?php
session_start();
    include "./connect.php";
    include "./function_giohang.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    } 
    $query = $pdo-> prepare("SELECT * FROM tbl_product WHERE product_id = ? ");
    $query->execute([$product_id]);
    if($query){
        $product = $query->fetch();
    }
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
                    <!-- <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="video.php">VIDEO</a>
                    </li> -->
                    <li  class="">
                        <a class="a_nav text-white text-decoration-none"href="lienhe.php">LIÊN HỆ</a>
                    </li>
                </ul>
        </nav>
        <!-- Detail -->
        <section class="product" style="padding-top:50px; padding-bottom:0px">
            <div class="content">
                <div class="product-content">
                    <form class="product-content row" action="giohang.php" method="GET">
                        <div class="product-content-left">
                            <div class="product-content-left-big-img" style="padding-left: 15px;">
                                <img src="./admin/uploads/<?php echo $product['product_img'] ?>" alt=""weight="300px" height="400px">
                            </div>
                        </div>
                        <div class="product-content-right">
                            <div class="product-content-right-product-name">
                                <h1 style="font-size:2rem"><?php echo $product['product_name'] ?></h1>
                                <p>Số lượng: <?php echo $product['product_quantity'] ?></p>
                            </div>
                            <div class="product-content-right-product-price">
                                <p><?php echo number_format( $product['product_price'] ) ?><sup>đ</sup></p>
                            </div>
            
                            <div class="quatity quantity">
                                <p style="font-weight: bold; font-size: 1rem;">Số Lượng: </p>
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                <input type="number" name="quatity" value="1" style="font-size:1rem;width:5rem">

                            </div>

                            <div class="product-content-right-product-button">
                                <button href="giohang.php?product_id=<?php echo $product['product_id'] ?>" type="submit" class="btn">Mua</a>
                            </div>
                    </form>
                        <div class="product-content-right-bottom ">
                            
                            <div class="product-content-right-bottom-content-big">
                                <div class="product-content-right-bottom-content-title">
                                    <div class="product-content-right-bottom-content-title-item ">
                                        <p>Chi tiết sản phẩm</p>
                                    </div>
                                </div>
                                    Để xem  video cá mời quý khách nhấn vào đường link bên dưới đê xem, nhớ nhấn vào đăng kí kênh để cặp nhật thêm các video cá mới,
                                    nếu như thấy hay thì hãy  shere lên facebook để ủng hộ mình nhé, chúc quý khách sức khỏe!
                                    <a href="https://www.youtube.com/playlist?list"> https://www.youtube.com/playlist?list</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <br>
        <?php include("footer.php") ?>
        <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
        <script src="js/js.js"></script>
    </div>   
</body>  

</html>