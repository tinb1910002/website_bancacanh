<?php
session_start();
require "./connect.php";

$err = [];
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = ?";
            $query = $pdo-> prepare($sql); 
            $query->execute([$email]);
            $checkEmail = $query -> rowcount();
            $data = $query -> fetch();
            if ($checkEmail == 1) {
                $checkPass = password_verify($password, $data['password']);
                if ($checkPass and $data["usertype"]=="user"){
                    //luu vao Session
                    $_SESSION['user'] = $data;
                    header('location: trangchu.php');
                } 
                else if ($checkPass and $data["usertype"]=="admin"){
                    $_SESSION['user'] = $data;
                    header('location: admin/productlist.php');
                }
                else{
                    $err['password'] = "Sai mat khau";
                }
            } else {
                $err['email'] = "Email không tồn tại";
            }
            if (empty($email)) {
                $err['email'] = "Ban chua nhap email";
            }
            if (empty($password)) {
                $err['password'] = "Ban chua nhap mat khau";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.con" href="./img/logonho.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error{
            color: red;
        }
    </style>
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
                    <a href="dangnhap.php" class="text-decoration-none">
                      <img src="./img/user.png" width="20px" height="20px" alt="">
                      <span>Tài khoản</span>
                    </a>
                  </div>
                <div class=" float-right">
                    <a class="text-decoration-none" href="giohang.php">
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
        <!-- -->

        <br>
        <div class="main-agileits">
            <div class="form-w3-agile">
                <h2>ĐĂNG NHẬP</h2>
                <form  method="POST" role="form">
                    <div class="form-sub-w3">
                        <input type="text" name="email" placeholder="Email "  />
                        <div class="error">
                            <span><?php echo (isset($err['email']))?$err['email']:'' ?></span>
                        </div>
                    <div class="icon-w3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    </div>
                    <div class="form-sub-w3">
                        <input type="password" name="password" placeholder="Password"  />
                    <div class="error">
                        <span><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                    </div>
                    <div class="icon-w3">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                    </div>
                    <p class="p-bottom-w3ls">Quên mật khẩu?<a class href="#">Click here</a></p>
                    <p class="p-bottom-w3ls1">&nbsp; Bạn chưa có tài khoản ?<a class href="dangky.php">  Đăng ký ngay</a></p>
                    <div class="clear"></div>
                    <button class="btn btn-success btn-block">
                        <i class="fas fa-power-off"></i> Đăng nhập
                    </button>
                </form>
            </div>
        </div>
        <br>
        <!--  -->
        <?php include 'footer.php' ?>        
    </div>
    <a href="#" class="nav-logo"></a>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>