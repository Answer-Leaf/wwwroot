<?php
    header('Location: Sign.php');
    session_start();
    $time=time()-1;
    echo date("Y-m-d H:i:s",$time);


    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";


    setcookie($_SESSION['id'] ,'',$time,"/");
    $_SESSION=array();
