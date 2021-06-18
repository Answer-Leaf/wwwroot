<?php
    //判断post 为空情况
    if (empty($_POST)){
        die("请输入登录信息");
    }else if (empty($_POST['user'])){
        die("用户名不能为空");
    }else if (empty($_POST['pass'])){
        die("密码不能为空");
    }

    //使用PDO 连接数据库
    $host="127.0.0.1";
    $db="php2102";
    $dbUser="root";
    $dbPass="root";
    $dbh=new PDO("mysql:host={$host};dbname={$db}",$dbUser,$dbPass);

    //使用PDO 对数据库查询
    $user=trim($_POST['user']);
    $pass=trim($_POST['pass']);
    $sql="select * from pdo_users where username=?";

    $stmt=$dbh -> prepare($sql);
    $stmt->bindParam(1,$user);
    $stmt->execute();
    $err_code=$stmt->errorCode();
    if ($err_code!="00000"){
        $err_info=$stmt->errorInfo();
        echo $err_info[2];
        die("登录失败");
    }
    //fetchAll 中需要传入一个参数  PDO::FETCH_ASSOC 为返回关联数组形式   返回数字索引数组用 PDO::FETCH_NUM 默认为两者都返回
    $fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($fetch)){
        die("用户名不存在");
    }else if (password_verify($pass,$fetch[0]['pass'])){

        $sql="update pdo_users set last_time=? where username=?";
        $time=date("Y-m-d H-i-s",time());
        $stmt=$dbh -> prepare($sql);
        $stmt->bindParam(1,$time);
        $stmt->bindParam(2,$fetch[0]['username']);
        $stmt->execute();

        if ($stmt->errorCode() != "00000"){
            $err_info=$stmt->errorInfo();
            echo $err_info[2];
            die("写入时间失败");
        }
        echo "登录成功";
    }else {
        die("密码错误");
    }
