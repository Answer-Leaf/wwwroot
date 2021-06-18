<?php

    if (empty($_GET) || array_key_exists('id',$_GET)==false || $_GET['id']==false){
         header("Refresh : 2 ; goods_list.php");
        die("请从列表页选择商品，正在转跳.....");
    }
    $_GET['id']=intval($_GET['id']);

    include  "../6-1/base.php";
$sql = "select goods_id as '商品ID' , goods_name as '商品名' , shop_price as '商品价格'  ,
       add_time as '上架时间' ,click_count as '浏览量'  from p_goods where goods_id = {$_GET['id']}";

    $sel=mysqli_query($mysql,$sql);

    $get_goods=mysqli_fetch_all($sel,MYSQLI_ASSOC);



    if ($_GET['id']==false || $get_goods==false){
        header("Refresh : 2 ; goods_list.php");
        die('详情页失效，请重新进入....');
    }

    $get_goods[0]['上架时间']=date("Y-m-d H:i:s" ,$get_goods[0]['上架时间']);
    foreach ($get_goods[0] as $k=>$v) {
        echo "{$k}:{$v}<br>";
    }
    $sql="update p_goods set click_count={$get_goods[0]['浏览量']}+1
    where goods_id = {$get_goods[0]['商品ID']} ";

    $stmt = mysqli_prepare($mysql,$sql);

   mysqli_stmt_execute($stmt);
