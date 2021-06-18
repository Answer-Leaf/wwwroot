<?php
    print_r($_POST);

    $name = $_POST['uname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    //将数据写入文件   file_put_contents()

    echo "<br >";
    $str = $name . ',' . $age . ',' . $address . "\n";
    echo $str;echo "<br>";
    file_put_contents('test1',$str,FILE_APPEND);
    echo "写入文件成功";
