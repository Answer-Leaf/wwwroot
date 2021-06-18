<?php
    session_start();            //开启会话
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);

    //连接数据库

    $link = new mysqli('localhost','root','root','php2102');
    $sql = "select * from users where  username='{$username}'";

    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    echo "<br>";

    //验证用户密码
    $p = password_verify($pass,$row[0]['pass']);
    if($p){
        echo "登录成功";
        //将用户信息保存到会话中
        $_SESSION['username'] = $row[0]['username'];
        //向客户端设置cookie
        setcookie('uid',$row[0]['id']);
    }else{
        echo "密码不正确";
    }
