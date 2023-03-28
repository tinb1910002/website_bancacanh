<?php
session_start();
include './connect.php';
//hủy session theo tên
unset($_SESSION['user']);

header('location: trangchu.php');
?>