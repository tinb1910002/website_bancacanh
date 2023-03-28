<?php
session_start();
    include "./connect.php";
    include "function_giohang.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];  
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $order_query = $pdo -> prepare("SELECT * FROM orders WHERE id= ?");
        $order_query -> execute([$id]);
        $order = $order_query->fetch();
        
        $id_account = $order['id_user'];
        $customer = $pdo ->prepare("SELECT * FROM users WHERE id = ?");
        $customer -> execute([$id_account]);
        $account = $customer ->fetchAll();

        $product = $pdo -> prepare("SELECT
            orders_detail.id_order,
            orders_detail.id_product,
            orders_detail.img,
            orders_detail.quatity,
            orders_detail.price,
            orders_detail.transport,
            tbl_product.product_name,
            tbl_product.product_code 
            FROM orders_detail 
            JOIN tbl_product 
            ON orders_detail.id_product=tbl_product.product_id 
            WHERE orders_detail.id_order= ?");
        $product ->execute([$id]);

        $total_price=0;

        if(isset($_POST['status'])){
            $status = $_POST['status'];
            // mysqli_query($conn,"UPDATE orders SET status='$status' WHERE id=$id");
            $update_status = $pdo->prepare("UPDATE orders SET status='$status' WHERE id=?");
            $update_status->execute([$id]);
            
            header("location: donhang.php");
        }
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

     <div class="" style="padding-top: 10px;">
        <div class="">
            <div class="panel ">
                <div class="panel-heading ">
                    <h3 style="font-size: 30px;" class="panel-title text-center">THÔNG TIN ĐƠN HÀNG</h3>
                </div>
                <div class="panel-body text-left " style="font-size:20px">
                    <p>Số điện thoại: <?php echo $order['phone'] ?></p>
                    <p>Địa chỉ: <?php echo $order['adress'] ?></p>
                    <p>Ngày đặt hàng: <?php echo $order['time'] ?></p>
                    <p>Trạng thái đơn hàng: 
                        <?php 
                            if($order['status']==1){?>
                            Chưa xử lý
                        <?php }elseif($order['status']==2){?>
                            Đơn hàng đã được xác nhận
                        <?php }elseif($order['status']==3){?>
                            Đang giao hàng
                        <?php }elseif($order['status']==4){?>
                            Đơn hàng đã được hoàn thành
                        <?php }else{?>
                            Hủy đơn
                        <?php }?>
                    </p>                    
                    </p>
                </div>
            </div>
            <div class="panel ">
                <div class="panel-heading ">
                    <h3 style="font-size: 25px;"  class="panel-title text-center">Danh sách sản phẩm</h3>
                    <form action="" method="POST" class="form-inline" role="form">
                        <?php if($order['status']==1){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="5" type="submit" class="btn btn-primary">HỦY ĐƠN</button>
                                
                            </div>                    
                        <?php } ?>
                        <?php if($order['status']==3){ ?> 
                            <div class="form-group " style="font-size:20px;">
                                <label for="" class="sr-only" >Trạng thái</label>
                                <button name="status" id="input"  required="required" style="margin-top: 10px;" value="4" type="submit" class="btn btn-primary">ĐÃ NHẬN ĐƯỢC HÀNG</button>                 
                            </div>
                            
                        <?php } ?>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-secondary">
                            <thead> 
                                <tr >
                                    <th>STT</th>
                                    <th>Hình ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình thức vận chuyển</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($product as $key => $value): 
                                    $total_price += ($value['price']*$value['quatity']);
                                ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><img src="./admin/uploads/<?php echo $value['img']?>" alt="" style="width:100px;"></td>
                                        <td><?php echo $value['product_name'] ?></td>
                                        <td><?php echo $value['transport'] ?></td>
                                        <td><?php echo $value['quatity'] ?></td>
                                        <td><?php echo number_format($value['price']) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="background-color: gainsboro">
                                    <td style="font-weight: bold;" >Tổng tiền</td>
                                    <td colspan="7" class="text-center " style="font-weight: bold; color:red;"><?php echo number_format($total_price)?>VNĐ</td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>

                </div>
            </div>  
        </div>
    </div>
    <?php include 'footer.php' ?>   
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>                  
</body>
</html>
