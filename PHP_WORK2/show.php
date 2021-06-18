<?php

    $mysql=new mysqli("127.0.0.1","root","root","php2102");



    if (!empty($_GET) ){
        if ( !empty($_GET['q_id'])){

            $sql="delete  from question_bank where q_id={$_GET['q_id']}";
            $del=mysqli_prepare($mysql,$sql);
            mysqli_stmt_execute($del);

        }

    }else if (empty($_POST['name'])){

        die("题库名不能为空，请输入题库名");
    }else if (empty($_POST['man'])){
        die("添加人不能为空，请输入添加人");
    }else{
        $time=date("Y-m-d H:i:s",time());
        $name=trim($_POST['name']);
        $man=trim($_POST['man']);


        $sql="insert into question_bank (q_name,q_man,q_time) values ('{$name}' , '{$man}','{$time}')";

        $stmt=mysqli_prepare($mysql , $sql);
        mysqli_stmt_execute($stmt);
    }


    $sql="select * from question_bank";
    $que=mysqli_query($mysql,$sql);
    $get_data=mysqli_fetch_all($que,MYSQLI_ASSOC);

//    echo "<pre>";
//    print_r($get_data);
//    echo "</pre>";
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>show</title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <td>题库id</td>
                    <td>题库名称</td>
                    <td>题库添加人</td>
                    <td>题库添加时间</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($get_data as $k=>$v) {
                        echo "<tr>";
                        echo "<td>{$v['q_id']}</td>";
                        echo "<td>{$v['q_name']}</td>";
                        echo "<td>{$v['q_man']}</td>";
                        echo "<td>{$v['q_time']}</td>";
                        echo "<td><a href=''>修改</a> <a href='show.php?q_id= ".$v['q_id']." '>删除</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="add.php">返回</a>
    </body>
</html>
