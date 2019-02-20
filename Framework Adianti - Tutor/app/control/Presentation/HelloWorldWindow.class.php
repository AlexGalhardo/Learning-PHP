<?php 
class HelloWorldWindow extends TWindow 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        parent::setTitle('Window title');
        parent::setSize(400,200);        
        parent::add(new TLabel('Hello World'));
    } 
} 
