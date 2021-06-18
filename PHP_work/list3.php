
<?php
    $str = file_get_contents('test1');
    echo $str;

    $arr1  = explode("\n",trim($str));
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
