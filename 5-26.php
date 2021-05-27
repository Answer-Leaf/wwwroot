<!--<!doctype html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>


        <table border="1">
            <tr>
                <th>姓名</th>
                <th>年龄</th>
                <th>Email</th>
            </tr>
            <?php
/*                $user=[
                    [
                        "name" => "zhangsan",
                        "age" => 18,
                        "Email" => "asdadas@asd.com"
                    ],
                    [
                        "name" => "lisi",
                        "age" => 13,
                        "Email" => "czvefe@zxpo.com"
                    ],
                    [
                        "name" => "wangwu",
                        "age" => 53,
                        "Email" => "grffvfs@aog.com"
                    ],
                    [
                    "name" => "zhaoliu",
                    "age" => 46,
                    "Email" => "azfasda@aog.com"
                    ]
                ];

                for ($i=0; $i<count($user);$i++){
                    echo "<tr><td>" .$user[$i]['name'] . "</td><td>" . $user[$i]['age'] . "</td><td>" . $user[$i]['Email'] . "</td></tr>";
                }

                die;

                foreach ($user as $k => $v ){
                    echo  "<tr>
                        <td>". $v['name']."</td>
                        <td>". $v['age']."</td>
                        <td>". $v['Email']."</td>
                        </tr>";

                }
            */?>
        </table>

        <ul>
            <?php
/*            die;
            $list=[
                'aaa',
                'bbb',
                'ccc',
                'ddd',
                'eee',
                'fff'
            ];

            echo "<li>foreach</li>";
            foreach($list as $k=>$v){

                echo "<li>" . $v ."</li>";
            }
            $length=count($list);
            for($i=0 ;$i<$length;$i++){
                echo "<li>" . $list[$i] . "</li>";
            };
            */?>
        </ul>
    </body>
</html>-->


<?php
 //   $arr =['e','b','d','a','c','f'];
//
////    echo mt_rand(1,100);
////    echo "\n";
////      sort($arr);
////        print_r($arr) ;
//
//
//    $str=file_get_contents('text2');
//   // var_dump($str);
//    $str_add=file_put_contents('./text2',$str+1);
//    echo "访问量".$str;

?>

<?php
    $arr=[1,2,3,4,1,6,4,5,2,6,1,2,6];
    $arr1=[];
    $arr2=[];
    $arr3=[];
    $arr4=[];
    //array_search(value,$arr)  //输入一个值，判断这个数组中是否有这个值，如果有返回这个值的索引，如果没有不会返回
    //但是array_search搜索到索引0值时不好判断，可以使用in_array() 判断与i给值是否在这个数组里，将返回true或false
//  print_r(array_search(4,$arr));
    foreach ($arr as $k => $v) {
        if (in_array($v,$arr1)==false){
            array_push($arr1,$v);
        }else{
            array_push($arr2,array_keys($arr,$v));//array_keys() 可以在数组里查找一个值，返回数组中所有相同的值，返回一个新数组
            //echo $k;
            array_push($arr4,$v);
        }
    }
    foreach ($arr2 as $k => $v) {

        array_push($arr3,count($v));
    }
    $num=array_combine($arr4,$arr3);
    echo "去重：";
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    echo "<hr>";
    echo "出现次数:";
    echo "<pre>";
    print_r($num);
    echo "</pre>";
?>