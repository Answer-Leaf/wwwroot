<?php
//include "Person.php";


function autoload($className){
    $className=$className."OOP.PHP";
    include $className;
}
spl_autoload_register("autoload");
$a=10;
$per=new Person($a);
$per->__destruct();
$clas=new Man(1);
echo "<br>";
$clas -> take();
