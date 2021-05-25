<?php
	$str="abcdefg zsdfg";
	$str1="abcdefg zsdfg";
	$new_str=substr($str,3);//截取一个字符串，（从某个下标开始，截取多少长度）
	$md5_str=md5($str);//将一个字符串转为md5的散列值；
	$trim_str=trim($str);//将字符串的首尾空格清除
	$ucfirst_str=ucfirst($str);//将字符串的第一个字母转为大写；
	$ucwords_str=ucwords($str);//将字符串中的所有单词首字母转为大写
	$strtoupper_str=strtoupper($str);//将字符串全部转换为大写；
	$strtolower_str=strtolower($str);//将字符串全部转换为小写；
	$str_shuffle=str_shuffle($str); //将字符串随机打乱；s
	$str_split=str_split($str);//将字符串转换成数组
	$strrev=strrev($str);//反转字符串
	/* echo $new_str;
	echo "\n";
	echo $md5_str;
	echo "\n";
	echo $trim_str;
	echo "\n"; */
	echo $ucfirst_str;
	echo "\n";
	echo $ucwords_str;
	echo "\n";
	echo $strtoupper_str;
	echo "\n";
	echo $strtolower_str; 
	echo "\n";
	echo $str_shuffle;
	echo "\n";
	echo $str_split; 
	// var_dump($str_split);
	// print_r($str_split);
	echo "\n";
	echo $strrev; 
	
	
	