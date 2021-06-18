<?php
    session_start();
    $host="127.0.0.1";
    $dbname="php2102";
    $dbUser="root";
    $dbPass="root";
    $dbh = new PDO("mysql:host={$host};dbname={$dbname}",$dbUser,$dbPass);
    if (empty($_POST)){
        if (empty($_GET) || isset($_GET['id'])==false ){
            header("Refresh:1;url=pdo_page.php");
            die("请选择商品");
        }else{
            $id=intval($_GET['id']);
        }
    }else if (in_array(null,$_POST)){
        die("提交不能有空");
    }else{
        $id=trim($_POST['goods_id']);
        $goods_name=trim($_POST['goods_name']);
        $goods_number=trim($_POST['goods_number']);
        $shop_price=trim($_POST['shop_price']);


        //将提交的post内容修改到数据库
        $sql=
            "update p_goods set 
             goods_id={$id} , goods_name='{$goods_name}' , goods_number={$goods_number} , shop_price={$shop_price}  
             where goods_id=?
            ";
        $stmt=$dbh -> prepare($sql);
        $stmt->bindParam(1,$_SESSION['id']);
        $stmt->execute();
        $err_code=$stmt -> errorCode();
        if ($err_code!="00000"){
            $err=$stmt-> errorInfo();
            echo $err[2];
            die('修改失败');
        }
    }

    //按id查询记录
    $sql="select goods_id , goods_name ,goods_number, shop_price from p_goods where goods_id=?  ";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $goods=$stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id']=$id;
    echo "<pre>";
    print_r($goods);
    echo "</pre>";

    ?>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Document</title>
        </head>
        <body>
        <form action="pdo_goods.php" method="post">
            <?php
            $arr=['商品ID','商品名','商品数量','商品价格'];
            $keys=array_keys($goods);//获取所有的数组中key   返回一个新数组  获取的key作为新数组的value
            $arr=array_combine($keys,$arr);//传入2个数组  将第一个和第二个数组的 键值  分别提取，合并为一个新数组 将第一个数组的键值作为 新数组的key  将第二个数组的键值作为 新数组的键值

            foreach ($goods  as $k => $v) {
                echo $arr[$k]."<input type='text' value='{$v}' name='{$k}'><br>";
            }

            ?>
            <input type="submit" value="提交">
        </form>
        </body>
    </html>
