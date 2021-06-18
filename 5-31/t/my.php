<?php
    //个人中心页面
    session_start();        //开启session

    //判断用户是否登录
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "你好 {$username} [{$_COOKIE['uid']}], 欢迎回来";
    }else{
        echo "请先登录";
    }

