<?php
    $id=$_GET['id'];
    $mysql= new mysqli("localhost","root","root","php2102");
    $sear="select * from users where id ={$id}";
    $sql=mysqli_query($mysql,$sear);
    $getSql=mysqli_fetch_all($sql,MYSQLI_ASSOC);

    echo "<pre>";
    print_r($getSql);
    echo "</pre>";