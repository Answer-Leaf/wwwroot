<?php
    for($i=100;$i<1000;$i++){
        $te=($i%100);
       $ten=intval(($i%100)/10);
       $h=intval($i/100);
       $ge=($i%100)%10;
        if (($ten*$ten*$ten)+($h*$h*$h)+($ge*$ge*$ge)==$i){
       //if (($ten*$ten*$ten)+($h*$h*$h)+($ge+$ge+$ge)==$i){
//           echo ($i%100)."<br>";
//           echo $h."<br>";
//           echo $ge."<br>";
           echo $i."<br>";
       }
    }


