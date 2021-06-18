<?php

//    if (empty($_GET)  || array_key_exists('goods_id' ,$_GET)==false ||   $_GET['goods_id'] =='' ) {
//        header("Refresh : 2 ; goods_list.php");
//        die("请从列表页选择商品，正在转跳.....");
//    }

    include "../6-1/base.php";

    if (array_key_exists('goods_id',$_POST)){
        $id=$_POST['goods_id'];
    }else{
        $id=$_GET['goods_id'];
    }
    if (empty($_POST)==false) {  //如果$_POST不为空，就代表提交了，获取到了，就对数据库修改值
        $goods_id=trim($_POST['goods_id']);
        $goods_name=trim($_POST['goods_name']);
        $shop_price=trim($_POST['shop_price']);
        $goods_number=trim($_POST['goods_number']);


        $sql = "update  p_goods set 
                        goods_id = {$goods_id}, 
                        goods_name= '{$goods_name}', 
                        shop_price= {$shop_price},
                        goods_number={$goods_number} 
                        where goods_id = '{$id}'
                        ";
        $stmt = mysqli_prepare($mysql, $sql);
        mysqli_stmt_execute($stmt);

    }





    $sql = "select goods_id , goods_name  , shop_price  ,
           goods_number  from p_goods where goods_id= '{$id}'";
    $sel_data=mysqli_query($mysql,$sql);
    $get_data=mysqli_fetch_all($sel_data,MYSQLI_ASSOC);


    $arr=['商品ID','商品名','商品价格','商品库存' ];
    $arr_i=0;

    ?>

    <form action="edit.php" method="post">
        <?php
            foreach ($get_data[0] as $k=>$v) {
                echo    $arr[$arr_i++] .' : '."<input type='text' value='{$v}' name='{$k}'><br>";
            }
        ?>
        <input type='submit'>
        <a href="goods_list.php">返回列表页</a>
    </form>




