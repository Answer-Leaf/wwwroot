<?php
$inp=$_POST;
echo "<pre>";
print_r($inp);
echo "</pre>";

$inp_u=$_POST['inp_u'];
$inp_u_reg="/^[A-z]{6,}$/";
if (!preg_match($inp_u_reg,$inp_u)){
    echo "用户名输入有误<br>";
}

$inp_e=$_POST['inp_e'];
$inp_e_reg="/^[A-z0-9]{5,20}@[A-z0-9]{2,9}\.[A-z]{2,6}$/";
if (!preg_match($inp_e_reg,$inp_e)){
    echo "邮箱输入有误<br>";
}


$inp_p=$_POST['inp_p'];
$inp_p_reg="/^[0-9A-z]{6,16}$/";
if (!preg_match($inp_p_reg,$inp_p)){
    echo "密码验证有误<br>";
}


$inp_pT=$_POST['inp_pT'];
if ($inp_pT!=$inp_p){
    echo "确认密码有误";
}

