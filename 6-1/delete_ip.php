<?php
    include "base.php";
    header("Location: ../5-31/5-31_work/Personal_session.php");
//    echo "<pre>";
//    print_r($_GET);
//    echo "</pre>";
//    $sql="select * from login where login_time='{$_GET["time"]}'";
//    $get_sql=mysqli_query($mysql,$sql);
//    $a=mysqli_fetch_all($get_sql,MYSQLI_ASSOC);

    $sql="delete from login where login_time='{$_GET["time"]}'";

    $stmt=mysqli_prepare($mysql,$sql);
    mysqli_stmt_execute($stmt);

