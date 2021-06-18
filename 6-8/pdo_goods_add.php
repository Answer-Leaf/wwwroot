<?php

    if (empty($_POST) ){
        header("Refresh:1 ; url=pdo_goods_add.html");
        die('正在转跳添加商品页面');
    }else if ( in_array(null,$_POST)){
        header("Refresh:1 ;url=pdo_goods_add.html");
        die('添加商品的信息内容不能有空');
    }



    $goods_name=trim($_POST['goods_name']);
    $goods_number=trim($_POST['goods_number']);
    $shop_price=trim($_POST['shop_price']);


    $host="127.0.0.1";
    $dbname="php2102";
    $dbUser="root";
    $dbPass="root";

    $dbh=new PDO("mysql:host=$host;dbname=$dbname",$dbUser,$dbPass) ;

    $sql="insert into p_goods (goods_name,goods_number,shop_price,add_time,goods_desc) values (?,?,?,?,'')";

    $time=time();


    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$goods_name);
    $stmt->bindParam(2,$goods_number);
    $stmt->bindParam(3,$shop_price);
    $stmt->bindParam(4,$time);
    echo "<pre>";
    print_r($stmt);
    echo "</pre>";

    $stmt -> execute();
    echo $stmt->errorCode();


    echo "<pre>";
    print_r($stmt->errorInfo());
    echo "</pre>";