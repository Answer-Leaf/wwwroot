<?php
//使用trim函数 来取除用户误输入的左右两边空格
$host="127.0.0.1";
$db_user="root";
$db_pass="root";
$db_name="php2102";

//使用 new 实例化一个mysqli的对象
$mysql=new mysqli($host,$db_user,$db_pass,$db_name);
//$mysql=new mysqli('localhost','root','root','php2102');