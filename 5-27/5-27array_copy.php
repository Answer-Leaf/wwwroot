<?php
    $arr=[1,2,3,4,5];
    $newarr=[];

    foreach ( $arr as $k=>$v) {
        $newarr[$k]=$v;
    }

    echo "<pre>";
    print_r($newarr);
    echo "</pre>";