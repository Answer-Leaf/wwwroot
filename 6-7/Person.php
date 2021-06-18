<?php
class Person {
    public  $name="zhangsan";
    public  $age=20;
    public  $weight=50;
    public  $gender="man";

    public function action($b){
        echo $b;
    }
    public function __construct($aa){
        $this ->action($aa);
    }
    public function  __destruct(){
        echo  "wo";
    }
}

