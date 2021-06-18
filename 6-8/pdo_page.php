<?php
    if (empty($_GET) ||array_key_exists('page',$_GET)==false || $_GET['page']<1 ){
        $_GET['page']=1;
    }

    $page=intval($_GET['page']);
    echo $page;
//    if ($page<1){
//        $state=1;
//    }else{
//
//    }

    $state=$page-1;
    $num=5;
    $goods_num=$num*$state;
    $host="127.0.0.1";
    $dbname="php2102";
    $dbUser="root";
    $dbPass="root";

    $dbh =new PDO("mysql:host={$host};dbname={$dbname}",$dbUser,$dbPass);
    $sql="select goods_id,goods_name from p_goods ORDER by  add_time desc limit {$goods_num},{$num}";

    $stmt=$dbh -> prepare($sql);

//    $stmt -> bindParam(1,$goods_num);
//    $stmt -> bindParam(2,$num);
    $stmt -> execute();
    $sel=$stmt ->fetchAll(PDO::FETCH_ASSOC);
    if ($page>1){
        $prev=$page-1;
    }else{
        $prev=1;
    }

    $sql="select count(*) from p_goods";
    $stmt=$dbh->query($sql);
    $count=$stmt->fetch(PDO::FETCH_NUM);
    $max_page=ceil($count[0]/10);

    if($page<$max_page){
        $next=$page+1;
    }else{
        $next=$page;
    }


?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>列表页</title>
    </head>
    <body>
        <ul>
            <?php
                foreach ($sel  as $k => $v) {
                    echo "<li><a href='pdo_goods.php?id={$v['goods_id']}'>{$v['goods_name']}</a>&nbsp;<a href='pdo_page_del.php?id={$v['goods_id']}'>删除</a></li>";
                }

            ?>
        </ul>
        <a href="pdo_page.php?page=1">首页</a>
        <a href="pdo_page.php?page=<?php echo $prev ; ?>">上一页</a>
        <a href="pdo_page.php?page=<?php echo $next ; ?>">下一页</a>
        <a href="pdo_page.php?page=<?php echo $max_page ; ?>">尾页</a>
    </body>
</html>
