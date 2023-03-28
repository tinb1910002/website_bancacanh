<?php
session_start();
    require "./connect.php";
    require "./function_giohang.php";
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    if(isset($_POST['name'])){
        $id_user = $user['id'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];
        $time = date('Y-m-d H:i:s');
        $total_cart =total_price($cart);
        $transport = $_POST['transport'];
        $status = 1;
        $query = ("INSERT INTO orders(id_user,phone,adress,time,total_price,transport,status) 
        VALUES (?,?,?,?,?,?,?)");
        $st = $pdo -> prepare ($query);
        $st -> execute([$id_user,$phone,$adress,$time,$total_cart,$transport,$status]);

        if($st){
            $id_order =$pdo-> lastInsertId();
            foreach($cart as $value){
                $sql=$pdo->prepare("INSERT INTO orders_detail(id_order,id_product,img,quatity,price,transport) 
                VALUES ('$id_order','$value[product_id]','$value[product_img]','$value[quatity]','$value[product_price]','$transport')");
                $sql->execute();

                $sql3=$pdo->prepare("INSERT INTO tbl_inventory(product_id,product_price,product_img,quatity) 
                VALUES('$value[product_id]','$value[product_price]','$value[product_img]','$value[quatity]')");
                $sql3 -> execute(); 

            }
        }

        



        unset($_SESSION['cart']);
        header('Location: trangchu.php');
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
                                <li ><a class="dropdown-item" href="chitietdonhang.php" style=" font-weight: bold; color:red;">Đơn hàng</a></li>
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

        
<!--  -->
<?php if(isset($_SESSION['user'])) {?> 
    <form action="" method="post">        
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <div class="col-sm-7">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <h1 style="color: blue;">Thông Tin Đơn Hàng</h1>
                            <div class="form-group">
                                <label style="font-size: 20px;" for=""><strong>Hình thức vận chuyển</strong> </label>
                                <br>
                                <select class="border border-dark" name="transport">
                                    <!-- <option></option> -->
                                    <option id="1">Vận chuyển bằng bưu điện</option>
                                    <option id="2">Vận chuyển bằng xe</option>
                                    <option id="3">Vận chuyển bằng đường hàng không</option>
                                </select>
                            </div>
                            <table class="table table-boredered table-hover">
                                <thead style="background-color: gainsboro">
                                    <tr>
                                        <th>Hình ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>                     
                                    <?php foreach ($cart as $key => $value): ?>
                                        <tr>
                                            <td><img src="admin/uploads/<?php echo $value['product_img'] ?>" alt="" style="width:100px;"></td>
                                            <td><?php echo $value['product_name'] ?></td>
                                            <td><?php echo $value['quatity'] ?></td>
                                            <td><?php echo number_format($value['product_price']) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr style="background-color: gainsboro">
                                        <td >Tổng tiền</td>
                                        <td colspan="7" class="text-center " style="font-weight: bold;">
                                            <?php
                                                 echo number_format(total_price($cart)); 
                                            ?>VNĐ                      
                                        </td>      
                                    </tr>
                                </tbody>
                            </table>                       
                        </div>
                    </div>
                </div>
         
                <div class="col-lg-5">
                    <h1 style="color: blue; font-size: 40px;">Thông Tin Khách Hàng</h1>
                    <form>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Họ tên</label>
                            <input required="required" value="<?php echo $user['name'] ?>" name="name" style="height:35px; font-size: 15px;" type="text" class="form-control" >              
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Email</label>
                            <input required="required" value="<?php echo $user['email'] ?>" name="email" style="height:35px;font-size: 15px;" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Số điện thoại</label>
                            <input required="required" style="height:35px;font-size: 15px;" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" >
                        </div>
                        <div class="form-group">
                            <label style="font-size: 20px;" for="">Địa chỉ</label>
                            <input required="required" style="height:35px;font-size: 15px;" type="text" name="adress" class="form-control" placeholder="Nhập địa chỉ">
                        </div>
                        <button name="action" value="thanhtoan" href="" class="btn btn-info">Thanh Toán</button>
                    </form>     
                </div>            
            </div>
        </div>
    </form>  
    <?php }else {?>
        <div class="alert alert-danger" style="margin-top: 160px; font-size:17px;">
            <button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Vui lòng đăng nhập để mua hàng</strong><a href="dangnhap.php?action=checkout" title="">Đăng nhập</a>
        </div>
    <?php } ?>
    <br>
    <?php include 'footer.php' ?>   
 </div>
 <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
</body>  
</html>