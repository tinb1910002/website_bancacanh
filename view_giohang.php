<?php
session_start();
    include "./connect.php";
    require "./function_giohang.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
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
                        <form action="" class="form_search" method="" name="form_search">
                        <input type="text" name="keywords" placeholder="Nhập từ khóa...">
                        <button class="btn btn-dark" type="submit">
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
                            <a class="text-decoration-none" href="#">
                            <img src="./img/shopping-cart.png" width="20px" height="20px" alt="">
                            <span>Giỏ hàng (<b>0</b>)</span>
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

        <div class="" style="padding-top: 50px;">
         <div class="row">
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-boredered table-hover">
                            <thead style=" background-color: gainsboro">
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <!-- <th>Hình thức vận chuyển</th> -->
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>              
                                <?php foreach ($cart as $key => $value): 
                                    $i++;
                                    ?>                                
                                    <tr>                     
                                        <td><?php echo $key++ ?></td>
                                        <td><img src="admin/uploads/<?php echo $value['product_img'] ?>" alt="" style="width:100px;"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <!-- <td><?php echo $value['product_code'] ?></td> -->
                                        <td>
                                            <form  action="giohang.php">
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="product_id" value="<?php  echo $value['product_id'] ?>">
                                                <input style="border: 1px solid black;width:50px" type="text" name="quatity" value="<?php echo $value['quatity'] ?>">
                                                <button style="border: 1px solid black"  type="submit">Cập nhật</button>
                                            </form>
                                        </td>
                                        <td><?php echo number_format($value['product_price']) ?></td>
                                        <td><a href="giohang.php?product_id=<?php echo $value['product_id'] ?> &action=delete"  title="" class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                <?php endforeach ?>
                                    <tr style="background-color: gainsboro">
                                        <td >Tổng tiền</td>
                                        <td colspan="7" class="text-center " style="font-weight: bold;"><?php echo number_format(total_price($cart))   ?>VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                        <?php  
                             if( $i>0){
                        ?>
                            <a href="thanhtoan.php" class="btn btn-info">Thanh Toán</a>
                        <?php  }  ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include 'footer.php' ?>   

    </div>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>  
</html>