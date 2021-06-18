<?php
    $post=$_POST;
    echo "<pre>";
    print_r($post);
    echo "</pre>";

    //将获取到的字符数组  以逗号分隔  转为字符串
    $post=join(',',$post);
    //将字符串放入文本中
    $new_text=file_put_contents("add",'!'.$post,FILE_APPEND);

    //echo file_get_contents('add');

    //将文本中的值提取   并转为数组
    $text_arr=explode("!",file_get_contents('add'));

    array_shift($text_arr);
//    echo "<pre>";
//    print_r($text_arr);
//    echo "</pre>";

    foreach ($text_arr as $k => $v) {
        $text_arr[$k] =explode(",",$v);
       // echo $v;
    }





    echo "<hr>";
    echo "<pre>";
    print_r($text_arr);
    echo "</pre>";


