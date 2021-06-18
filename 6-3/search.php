<?php
    include "../6-1/base.php";

    if (!array_key_exists('page',$_GET)){
        $_GET['page']=1;
    }

    $page=intval($_GET['page'])  ;
    $num=5;
    $start=$num*($page-1);
    $search=trim($_GET['search']) ;
    $sql="select goods_name ,goods_id from p_goods where goods_name like '%{$search}%' limit {$start} ,{$num}";

    $sel_sea=mysqli_query($mysql,$sql);
    $get_sea=mysqli_fetch_all($sel_sea,MYSQLI_ASSOC);



    $sql="select count(goods_name) as count from p_goods where goods_name like '%{$search}%'";
    $sel_count=mysqli_query($mysql,$sql);
    $count=mysqli_fetch_all($sel_count,MYSQLI_ASSOC);
    if ($page-1>0){
        $prev=$page-1;
    }else{
        $prev=1;
    }

    $last_page=ceil($count[0]['count']/$num);
    echo $count[0]['count'];
    if ($page<$last_page){
        $next=$page+1;
    }else{
        $next=$page;
    }
    echo "<h2>关于 {$search} 的商品有</h2>";
//    echo "<pre>";
//    print_r($get_sea);
//    echo "</pre>";
    ?>
<!doctype html>
<html lang="en">
    <head>
        <title>搜索结果</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <ul>
            <?php
                foreach ( $get_sea as $k => $v) {
                    $new_word="<span style='color: red'>$search</span>";
                    $re_str=str_replace($search,$new_word,$v['goods_name']);
                    echo "<li><a href='Goods.php?id=".$v['goods_id']."'>$re_str</a></li>";
                }
            ?>
        </ul>
        <a href="search.php?search=
        <?php
            echo $search;

        ?>
        &page=1
        ">首页</a>
        <a href="search.php?search=
            <?php
                echo $search;
                echo "&page=".$prev;
            ?>
        ">上一页</a>
        <a href="search.php?search=
            <?php
                echo $search;
                echo "&page=".$next
            ?>
        ">下一页</a>
        <a href="search.php?search=
            <?php
                echo $search;
                echo "&page=".$last_page;
            ?>
        ">尾页</a>
        <a href="search.html">返回</a>
    </body>
</html>
