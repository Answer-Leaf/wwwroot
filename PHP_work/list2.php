<?php

    $cont = file_get_contents("test1");
    echo $cont;echo "<br>";

    $arr = explode(',',$cont);
    print_r($arr);


