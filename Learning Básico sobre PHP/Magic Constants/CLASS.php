<?php

/*
__CLASS__


The __CLASS__ constant returns the name of the current class. Here's an example:

*/

class MyClass
{
    public function getClassName(){
        return __CLASS__;
    }
}
$obj = new MyClass();
echo $obj->getClassName(); // Displays: MyClass