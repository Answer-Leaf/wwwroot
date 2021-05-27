<?php
    function strRand ($length=0){//定义一个函数，函数中有一个参数，需要进行传参
        $str='';//定义一个空串用于后面接收循环出的字符串
        $rand_str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';//定义所有需要随机的字符的字符串
        $len=strlen($rand_str);//获取这个字符串长度
        for ($i=0;$i<$length;$i++){//循环的次数，即最后得到的随机字符串长度，即调用函数时传入的参数
            $str_r=mt_rand(0,$len-1);//定义一个随机数，随机数的最大值即是随机字符串的最后的下标
            $str.=$rand_str[$str_r];//将每次获取到的随机数作为下标，提取一个随机的字符，与之前定义的空串拼接，并重新赋值
        }
        return $str;//返回循环赋值的字符串
    }
   echo strRand(10);