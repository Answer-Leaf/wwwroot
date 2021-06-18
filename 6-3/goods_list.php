<?php
    include "../6-1/base.php";
    echo "<a href='search.html'>搜索</a><br>";//转跳
    if (empty($_GET)  || array_key_exists('page' ,$_GET)==false ||  $_GET['page'] <1 ||  $_GET['page'] =='' ) {
        $_GET['page'] = 1;
    }

    $page=intval($_GET['page']);
    echo  $page;
    $row_num=10;
    $start=($page-1)*$row_num;
    $sql="select goods_id , goods_name , goods_sn  from p_goods 
            ORDER by add_time desc limit  {$start} ,{$row_num}";

    $sel=mysqli_query($mysql , $sql);
    $get_data=mysqli_fetch_all($sel,MYSQLI_ASSOC);

    echo "<ul>";
    foreach ($get_data as  $k => $v) {
        echo "<li><a href='Goods.php?id={$v['goods_id']}'>{$v['goods_name']}</a>&nbsp;&nbsp;
        <a href='edit.php?goods_id={$v['goods_id']}'>编辑商品信息</a></li>";
    }

    echo "</ul>";
//    if ( $_GET['page']==1){
//        $_GET['page']=2;
//    }
    $sql="select count(goods_id) as count from p_goods";
    $sel_count=mysqli_query($mysql,$sql);
    $get_count=mysqli_fetch_all($sel_count,MYSQLI_ASSOC);
    echo "<pre>";
    print_r($page);
    echo "</pre>";

    $last_page=ceil($get_count[0]['count']/$row_num);
    ?>
    <a href="goods_list.php?page=1">首页</a>
    <a href='goods_list.php?page=
        <?php
            if ($page>1){
            echo $page-=1; //让$page -1 然后再让$page +1 ,代码由上而下，下面的【下一页】才能加过去
            $page+=1;
            }else{
             echo $page=1;
            }
            ?>
    '>上一页</a>
    &nbsp&nbsp&nbsp
    <a href='goods_list.php?page=
    <?php
        if ($page<$last_page){
            echo $page+=1;
        }else{
            echo $page;
        }
     ?>
    '>下一页</a>
    <a href='goods_list.php?page=<?php echo  $last_page ; ?>'>尾页</a>

<a href='goods.php?id={$v['goods_id']}'>

get
['id'] =>


{$v['goods_name']}


</a>