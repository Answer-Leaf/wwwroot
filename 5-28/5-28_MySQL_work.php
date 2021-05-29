<?php
//    $tab=new mysqli("localhost","root","root","goods");
//    $sql="select * from shop_goods";
//    $search=mysqli_query($tab,"select * from shop_goods");
//    $rows=mysqli_fetch_all($search,MYSQLI_ASSOC);
//    echo "<pre>";
//    print_r($rows);
//    echo "</pre>";

    //首先连接MySQL 使用new mysqli()  写入4个参数  => （域名,用户名,密码，数据库名）
    $mysql=new mysqli("localhost","root","root","php2102");

   //写上一个需要使用的MySQL语句
    $sel="select * from  users";

    //使用mysqli_query()函数进行查询   函数为：执行某个针对数据库的查询
    $getSel =mysqli_query($mysql,$sel);


    //使用mysqli——fetch_all()函数    获取到mysqli_query() 函数查询到的内容    （fetch  拿到/获取）
    $print=mysqli_fetch_all($getSel,MYSQLI_ASSOC);    //后面第二个参数为固定写法，表示获取到查询
    echo "<pre>";
    print_r($print);
    echo "</pre>";
