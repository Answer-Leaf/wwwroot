<?php
    session_start();

    echo "<pre>";
    print_r($_COOKIE);      //获取 客户端 cookie信息
    echo "</pre>";

    echo "<hr />";
    echo "<pre>";
    print_r($_SESSION);     //获取 服务器中的 会话信息
    echo "</pre>";
