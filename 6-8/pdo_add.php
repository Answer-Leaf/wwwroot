<?php
    if (empty($_POST)){
        die("请输入注册的内容");
    }else if (in_array(null,$_POST)){
        die("注册的内容不能为空");
    }
    $host="127.0.0.1";
    $dbname="php2102";
    $dbUser="root";
    $dbPass="root";
    $dbh=new PDO("mysql:host={$host};dbname={$dbname}",$dbUser,$dbPass);


    $user=trim($_POST['user']);
    $email=trim($_POST['email']);
    $mobile=trim($_POST['mobile']);
    $pass=trim($_POST['pass']);
    $pass=password_hash($pass,PASSWORD_DEFAULT);
    $passT=trim($_POST['passT']);
    $reg_time=date("Y-m-d H:i:s",time());

    $sql="insert into pdo_users (`username`, `email`,`mobile`, `pass` ,`reg_time`) values (?,?,?,?,?)";

    $stmt=$dbh -> prepare($sql);
    $stmt -> bindParam(1,$user);
    $stmt -> bindParam(2,$email);
    $stmt -> bindParam(3,$mobile);
    $stmt -> bindParam(4,$pass);
    $stmt -> bindParam(5,$reg_time);
    $stmt-> execute();
    $err_code=$stmt-> errorCode();
    $err_info=$stmt -> errorInfo();
    if ($err_info[0]!="00000"){
        echo "注册失败";
    }else{
        echo "注册成功";
    }

