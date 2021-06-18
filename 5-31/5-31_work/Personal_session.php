<?php

    session_start();
    include "../../6-1/base.php";

    if (isset($_SESSION['username'])){
        echo "你好".$_SESSION['username']."<br>欢迎回来" ;

        echo " <form method=\"\" action=\"../../6-2/cl.php\">
                <input type=\"submit\" name=\"\" value=\"退出登录\" >
           </form>";

        $sql = "select * from login where uid='{$_SESSION['id']}'";
        $get_log = mysqli_query($mysql,$sql);
        $fe = mysqli_fetch_all($get_log,MYSQLI_ASSOC);

//        var_dump($get_log);
//        echo "<pre>";
//        print_r($fe);
//        echo "</pre>";
        echo "<table border='1' >";
        foreach ($fe as $k=>$v) {
            echo "<tr>
                    <td>{$v['uid']}</td>
                    <td>{$v['login_time']}</td>
                    <td>{$v['login_ip']}</td>
                    <td>{$v['ua']}</td>
                    <td><a href='../../6-1/delete_ip.php?time={$v['login_time']}'>删除</a></td>
                </tr>";
        }
        echo "</table>";


    }else{
        echo "请先登录,正在转跳登录页面";
        header('Refresh:1;url=../../6-2/cl.php');
    }


