<?php
    include "./connect.php";
    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }
    
    $action = (isset($_GET['action']) ? $_GET['action'] : "add");
    $quatity = (isset($_GET['quatity'])) ? $_GET['quatity'] : 1;

    if($quatity <0){
        $quatity =1;
    }
    $query =$pdo ->prepare ("SELECT * FROM tbl_product WHERE product_id = ?");
    $query->execute([$product_id]);
    if($query){
        $product = $query ->fetch();
    }
    
    $item = [
        'product_id' => $product['product_id'],
        'product_name' => $product['product_name'],
        'product_code' => $product['product_code'],
        'product_price' => $product['product_price'],
        'product_img' => $product['product_img'],
        'quatity' => $quatity,
        'product_quantity' => $product_quantity
    ];

    if($action == 'add'){
        if(isset($_SESSION['cart'][$product_id])){
            $_SESSION['cart'][$product_id]['quatity'] += $quatity;
        }
        else{
            $_SESSION['cart'][$product_id]=$item;
        }
    }
    
    if($action == 'update'){
            $_SESSION['cart'][$product_id]['quatity'] = $quatity;
    }
    
    if($action == 'delete'){
        $product_id=trim($product_id);
        unset($_SESSION['cart'][$product_id]);

    }
    

    header('location:view_giohang.php');

?>

