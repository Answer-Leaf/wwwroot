<?php

    $post=$_POST;
    $user=$post['user'];
    $age=$post['age'];
    $home=$post['home'];

    $host="127.0.0.1";
    $db_user="root";
    $db_pass="root";
    $db_name="php2102";

    //使用 new 实例化一个mysqli的对象
    $mysql=new mysqli($host,$db_user,$db_pass,$db_name);

    $sql="insert into user_w (username,age,home) values ('{$user}','{$age}','{$home}') ";

    //准备阶段
    $stmt=mysqli_prepare($mysql,$sql);
    //执行阶段
    if ( mysqli_stmt_execute($stmt)){
        echo "提交成功";
    }else{
        echo "提交失败";
    }

