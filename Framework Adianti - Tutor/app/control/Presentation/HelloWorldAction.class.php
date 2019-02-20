<?php 
class HelloWorldAction extends TPage 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
    }
    
    public function onHelloWorld()
    {
        parent::add(new TLabel('Hello World'));
    }
} 
