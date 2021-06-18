<?php
    header('Refresh:1;url=../5-31/5-31_work/Personal_session.php');
    echo "登陆成功,正在转跳个人中心......";
    include "base.php";
    session_start();

    $uid=$_SESSION['id'];
    $login_time=date("Y-m-d H:i:s",time());

    $login_ip=$_SERVER['REMOTE_ADDR'];
    $ua=$_SERVER['HTTP_USER_AGENT'];

    $sql="insert into login (uid,login_time,login_ip,ua) values ('{$uid}','{$login_time}','{$login_ip}','{$ua}')";

    $stmt=mysqli_prepare($mysql,$sql);
    $a=mysqli_stmt_execute($stmt);
