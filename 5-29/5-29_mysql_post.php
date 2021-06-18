<?php
    session_start();

    if (!empty($_SESSION)){
        if ( array_key_exists($_SESSION['username'],$_COOKIE)){
            echo "已登录，退出登录后，可在注册页面注册，正在转跳个人中心......";
            header("Refresh:2;url=../5-31/5-31_work/Personal_session.php");
            die();
        }
    }
    if (empty($_POST)){
        echo "如需注册，请在注册页面注册";
        header("Refresh : 1; reg.html");
        die();
    }
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['mobile']) || empty($_POST['pass']) ){

            echo "注册失败，信息不能有空";
            header("Refresh : 1; reg.html");
            die();

    }
    include  "../6-1/base.php";
    $user=trim($_POST['username'])  ;
    $email=trim($_POST['email']) ;
    $mobile=trim($_POST['mobile'])  ;
    $pass=trim($_POST['pass']) ;
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";

    //去数据库判断用户是否已存在 找到用户说明用户已存在
    $sql_con="select * from users where  username='{$user}'  || email = '{$email}' || mobile='{$mobile}'";
    $query=mysqli_query($mysql,$sql_con);

    //var_dump($query);
    $fe=mysqli_fetch_all($query,MYSQLI_ASSOC);
//    echo "<pre>";
//    print_r($fe);
//    echo "</pre>";


    if ($fe){
        header("Refresh:2;reg.html");
        die("用户已存在，请重新注册");
    }
    //将密码转换为哈希值
    $pass=password_hash($pass,PASSWORD_DEFAULT);

    //获取当前时间戳并转为时间
    $time=date('Y-m-d H-i-s',time());


    $sql="insert into users (username,email,mobile,pass,reg_time) values ('{$user}','{$email}','{$mobile}','{$pass}','{$time}')";

    $stmt=mysqli_prepare($mysql,$sql);

    $res=mysqli_stmt_execute($stmt);

    if ($res){
        echo "注册成功,这是您的注册信息<br>";
        echo "账号：".$user."<br>";
        echo "邮箱：".$email."<br>";
        echo "手机号：".$mobile."<br>";
        echo "密码：".$user."<br>";
        echo "<a href='login.html'>去登录</a>";
        //header("Refresh:1;login.html");
    }else{
        echo  "注册失败".mysqli_connect_error();
    }