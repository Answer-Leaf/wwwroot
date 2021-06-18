<?php
    include  "../6-1/base.php";


session_start();
        //array_key_exists(key,array)  判断一个数组中是否有这个键名
    if (!empty($_SESSION)){
        if ( array_key_exists($_SESSION['username'],$_COOKIE)){
            echo "已经登录，正在转跳个人中心......";
            header("Refresh:1;url=../5-31/5-31_work/Personal_session.php");
            die();
        }
    }
    if (empty($_POST)){
        echo "请在登录页面登录.....";
        header("Refresh:2;url=login.html");
        die();
    }

   // die();
    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $SQL="select * from users where  username='{$username}' || email='{$username}' || mobile='{$username}'";
    $exe=mysqli_query($mysql,$SQL);
    $use_arr=mysqli_fetch_all($exe,MYSQLI_ASSOC);

//    echo "<pre>";
//    print_r($use_arr);
//    echo "</pre>";
//    die();
    if (!$use_arr){
        $_SESSION=[];
        header("Refresh:1;url=login.html");
        die('用户名有误,请重新输入');
    }

    if (password_verify($pass,$use_arr[0]['pass'])==false){
        header("Refresh:1;url=login.html");
        die('密码有误,请重新输入');
    }else{
        $time=date("Y-m-d H:i:s",time());
        $sql_time="update users set last_time='{$time}' where username='{$username}' || email='{$username}' || mobile='{$username}'";

        $per =mysqli_prepare($mysql,$sql_time);
        $exe=mysqli_stmt_execute($per);

        header('Location:../6-1/login_ip.php');
        setcookie($use_arr[0]['id'],$use_arr[0]["reg_time"],time()+360,"/");
        $_SESSION =$use_arr[0];
    }



