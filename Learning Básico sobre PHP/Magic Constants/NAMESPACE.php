<?php

/*
__NAMESPACE__

The __NAMESPACE__ constant returns the name of the current namespace.
*/

namespace MyNamespace;
class MyClass
{
    public function getNamespace(){
        return __NAMESPACE__;
    }
}
$obj = new MyClass();
echo $obj->getNamespace(); // Displays: MyNamespace