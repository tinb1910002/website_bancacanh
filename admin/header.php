<?php
    include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <link rel="stylesheet" href="style_admin.css">

    <link rel="stylesheet" href="../bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/0dc653ea69.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="">
            <div class="header bg-dark">
                    <h1 class="logo" style="margin-right: 0px;font-size: 30px;">Shop cá cảnh</h1>
                    <nav class="navbar">
                        <a href="./cartegorylist.php">Quản lý loại sản phẩm</a>
                        <a href="./productlist.php">Quản lý sản phẩm</a>
                        <a href="./order.php">Quản lý đơn hàng</a>
                        <a href="./userlist.php">Quản lý thành viên</a>
                        <a href="./inventory.php">Kho</a>
                        <a href="../dangxuat.php"><i class="fas fa-sign-out-alt"></i></a>   
                    </nav>
                               
            </div>
        </div>
    </body>
</html>