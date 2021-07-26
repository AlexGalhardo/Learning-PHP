<?php

/*

__METHOD__

The __METHOD__ constant returns the name of the current class method.
*/

class Sample
{
    public function myMethod(){
        echo __METHOD__;
    }
}
$obj = new Sample();
$obj->myMethod(); // Displays: Sample::myMethod