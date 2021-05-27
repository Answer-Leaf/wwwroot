<?php
    //数组练习
    $arr=["zhangsan","lisi","wangwu","zhaoliu"];
//sort()对一个数组进行顺序排序
    //echo "<pre>";  print_r($arr);echo "</pre>";
    //   sort($arr);
    //echo "<pre>";    print_r($arr);echo "</pre>";


//array_reveres()  反转数组，将数组中的值从尾到头排列
//    $arr_re=[6,3,1,6,3,2,7,9,3];
//    $new_re=array_reverse($arr_re);
//    echo "<pre>";   print_r($new_re); echo "</pre>";
//        sort($arr_re);
//    echo "<pre>";   print_r($arr_re); echo "</pre>";

//shuffle() 对数组中的值进行随机打乱
//    $arr_sh=['a','b','c','d','e','f','g'];
//    shuffle($arr_sh);
//echo "<pre>";   print_r($arr_sh); echo "</pre>";

//in_array() 检测一个值是否在数组中，如果有返回true，没有找到返回false
//    $arr_in=[1,2,3,4,5,6,7,8,9];
//    $node=9;
//    $bool= in_array($node,$arr_in);
//    var_dump($bool);

//array_rand() 随机返回数组中的一个或多个键名
//    $arr_rand=["a",'b','c','d','e','f','g'];
//    $arr_rand2=[
//        ['name'=> 'a','age'=>12,'email'=> 'adsd@as.com'],
//        ['name'=> 'b','age'=>22,'email'=> 'hujh@as.com'],
//        ['name'=> 'c','age'=>32,'email'=> 'xfdsd@as.com'],
//    ];
//    //echo "<pre>";   print_r(array_rand($arr_rand,3)); echo "</pre>";
//    $k=array_rand($arr_rand2,2);
//
//
//    echo $arr_rand2[$k[0]]['name'];

//array_merge() 将两个数组合并成一个新数组

//    $arr_m1=[1,2,3,4,5];
//    $arr_m2=[6,7,8,9,0];
//    $arr_m=array_merge($arr_m1,$arr_m2);
//echo "<pre>";   print_r($arr_m); echo "</pre>";

//array_column()  找到一个二维数组的中的键名，获取到相同键名的所有值，并返回一个新数组
//    $arr_co=[
//        ['name'=> 'a','age'=>12,'email'=> 'adsd@as.com'],
//        ['name'=> 'b','age'=>22,'email'=> 'hujh@as.com'],
//        ['name'=> 'c','age'=>32,'email'=> 'xfdsd@as.com'],
//        'name'=> "aa",
//        [['name'=>'abc','asd'=>'asd'],['name'=>'bbbc','asd'=>'asd'],['name'=>'ccabc','asd'=>'asd']],
//    ];
//    $column=array_column($arr_co,"name");
//echo "<pre>";   print_r($column); echo "</pre>";
//    $arr_c=['name'=> 'a','age'=>12,'email'=> 'adsd@as.com'];
//    $co=array_column($arr_c,'name');
//echo "<pre>";   print_r($co); echo "</pre>";


//array_values() 获取数组中所有的键值，返回一个新的数组
    $arr_v=['name'=> 'a','age'=>12,'email'=> 'adsd@as.com'];

    $va=array_values($arr_v);
echo "<pre>";   print_r($va); echo "</pre>";