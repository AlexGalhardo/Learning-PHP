<?php 
class ObjectFirstLast extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction
            
            $first = Customer::first();
            print '<b>First ID</b>:   ' . $first->id . '<br>';
            print '<b>First Name</b>: ' . $first->name . '<br>';
            
            echo  '<br>';
            $last  = Customer::last();
            print '<b>Last ID</b>:   ' . $last->id . '<br>';
            print '<b>Last Name</b>: ' . $last->name . '<br>';
            
            TTransaction::close(); // closes transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
