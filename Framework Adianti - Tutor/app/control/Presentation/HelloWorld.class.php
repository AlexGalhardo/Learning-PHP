<?php 
class HelloWorld extends TPage 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        
        parent::add(new TLabel('Hello World'));
    } 
} 
