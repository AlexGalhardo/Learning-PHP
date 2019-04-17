<?php 
class HelloWorldAction2 extends TPage 
{ 
    private $label;
    
    public function __construct() 
    { 
        parent::__construct();
        $this->label = new TLabel('');
        parent::add($this->label);
    } 
    
    public function onHelloWorld() 
    { 
         $this->label->setValue('Hello World');
    } 
} 