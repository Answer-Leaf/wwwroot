<?php
//    $arr=[
//        'name' => 'abc',
//        'age' =>18,
//        'sex' =>'man'
//    ];

    $arr =array(
        'name' => 'zzz',
        'age' =>  17,
        'sex' => '女'
     );
    //var_dump($arr); //输出一个数组
  //  print_r($arr);  //输出一个数组的方式二
   // echo $arr['name']; //输出一个数组的下标，对应某个值
//    foreach($arr as $k => $v){   //使用foreach来遍历数组， $arr as(关键字)  $k => $v  (分别对应数组的键名和值)
//        echo '$k='.$k, "  ".'$v=' . $v ."\n"; // 输出键名和下标
//    };
    $arr1=[1,2,3,4,5,6,7,8,9];
    $length=count($arr1);//count函数返回一个数组的长度
    for ($i =0;$i<$length;$i++){
        echo $arr1[$i]."\n";
    }