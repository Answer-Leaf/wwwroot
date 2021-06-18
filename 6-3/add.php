<?php
    include "../6-1/base.php";
    $new_goods=$_POST;
    $goods_name=trim($_POST['goods_name']);
    $shop_price=trim( $_POST['shop_price']) ;
    $goods_number=trim($_POST['goods_number']) ;
    echo "<pre>";
    print_r($new_goods);
    echo "</pre>";
    $time=time();
    $sql="insert into p_goods 
    (goods_name,shop_price,goods_number,add_time,goods_desc)
    values 
    ('{$goods_name}',{$shop_price},{$goods_number},{$time},'1')
    ";

    $stmt=mysqli_prepare($mysql,$sql);
    mysqli_stmt_execute($stmt);