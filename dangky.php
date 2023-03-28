<?php
    require "./connect.php";
    $err = [];
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rPassword = $_POST['rpassword'];
        $query = ("SELECT * FROM users WHERE email = ?");
        $check = $pdo -> prepare($query);
        $check -> execute ([$email]);
        $checkEmail = $check -> fetch();
        if($email == isset($checkEmail['email'])){
            $err['email'] = "Email đã tồn tại";
        }
        if(empty($name)){
            $err['name'] = 'Bạn chưa nhập tên';
        }
        if(empty($email)){
            $err['email'] = 'Bạn chưa nhập email';
        }
        if(empty($password)){
            $err['password'] = 'Bạn chưa nhập mật khẩu';
        }
        if($password != $rPassword){
            $err['rPassword'] = 'Mật khẩu nhập lại không đúng';
        }
        if(empty($err)){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(name,email,password) VALUES (?,?,?)";
	        $st = $pdo -> prepare($sql);
            $st->execute([$name, $email, $pass]);
                header('location: dangnhap.php');
        }
    }
?>
<!--  -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
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
        <div class="card">
            <div class="card-header">
                <h3 class="h3_after text-center">ĐĂNG KÝ </h3>
            </div>
            <div class="card-body">
                <form id="signupForm" method="post" class="form-horizontal">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="fullname"> Họ và tên của bạn</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="" name="name" placeholder="Họ và tên của bạn" />
                            <span class="error"><?php echo (isset($err['name']))? $err['name']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="email">Hộp thư điện tử</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Hộp thư điện tử" />
                            <span class="error"><?php echo (isset($err['email']))? $err['email']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                            <span class="error"><?php echo (isset($err['password']))? $err['password']:'' ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="" name="rpassword" placeholder="Nhập lại mật khẩu" />
                            <span class="error"><?php echo (isset($err['rpassword']))? $err['rpassword']:'' ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 offset-sm-4">
                            <button type="submit" class="btn btn-primary" name="signup" value="signup">Đăng ký</button>
                            <button type="submit" class="btn btn-danger offset-6"><a class="text-white text-decoration-none" href="trangchu.php">Hủy bỏ</a></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <br>
        <!--  -->
        <?php include 'footer.php' ?>         
    </div>
    <a href="#" class="nav-logo"></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>