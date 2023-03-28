<?php
session_start();
    require "./connect.php";
    require "./function_giohang.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];  
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    $id = $_SESSION['user']['id'];
    $product =$pdo -> prepare("SELECT * FROM orders WHERE id_user = ? ORDER BY id DESC");
    $product -> execute([$id]);               
    $order= $product ->fetchAll();
    $i=0;
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
        <div class="container" style="padding-top: 30px;">
        <div class="row">
            <?php
                    if($order<1){
            ?>       
                    <h2>Bạn chưa đặt hàng!</h2>
            <?php }else{?>
            <h1 style="color:#ff0084a8; font-weight:bold;" class="text-center">DANH SÁCH ĐƠN ĐÃ MUA</h1>
            <table class="table table-secondary" style="    margin-top: 10px;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($order as $key => $value ) :?>
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['time'] ?></td>
                            <td><?php echo number_format($value['total_price']) ?></td>
                            <td>
                                <?php 
                                    if($value['status']==1){?>
                                    Chờ xử lý
                                <?php }elseif($value['status']==2){?>
                                    Đơn hàng đã được xác nhận
                                <?php }elseif($value['status']==3){?>
                                    Đang giao hàng
                                <?php }elseif($value['status']==4){?>
                                    Đơn hàng đã được hoàn thành
                                <?php }else{?>
                                    Hủy đơn
                                <?php }?>
                            </td>                            
                            <td><a href="chitietdonhang.php?id=<?php echo $value['id'] ?>">Chi tiết</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php include 'footer.php' ?>   
 </div>
 <a href="#" class="nav-logo"></a>
<script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
</body>  
</html>        