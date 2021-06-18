<?php
    //session_start();
    // 服务器向客户端（浏览器） 发送（设置）一个cookie

    // 2102.com
    // xxx.a.2102.com
    // www.2102.com
    // xxx.2102.com
    setcookie("xxx","Hello world");
    setcookie("uid",123456,time()+3600,'/5-31','2102.com');