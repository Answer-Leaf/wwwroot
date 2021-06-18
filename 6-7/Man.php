<?php

class Man extends Person {
    public $name= "aaa";
    public function go(){

        $this ->action($this->name);
    }

    public function take(){

        $this->go();
    }
}


