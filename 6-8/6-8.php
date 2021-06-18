<?php
    $host="127.0.0.1";
    $db="php2102";
    $user="root";
    $pass="root";
    /*pdo连接数据量，先需要new实例化一个pdo对象 ，传入参数
（"【先传入地址和库名】mysql:host=xxx.xxx.xxx.xx ; dbname=xxx", mysql的用户名，mysql的密码）三个参数*/
    $dbh=new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $sql="select * from users where id = ?";

    $stmt=$dbh -> prepare($sql);

    //execute 里面传入的参数 需要放在一个数组里再传进去
    $res=$stmt -> execute([$_GET['id']]);
    if (($stmt ->errorCode()) !="00000" ){  //errorCode() 返回错误码  没有错误时错误码等于00000
        die("数据库访问错误");
    }

    echo "<pre>";
    print_r($stmt ->errorInfo()); //返回错误信息，包含错误码，报错的信息，以数组的形式返回
    echo "</pre>";


    $get=$stmt ->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($get);
    echo "</pre>";


