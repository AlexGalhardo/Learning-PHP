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
            print 'First ID:   ' . $first->id;
            print 'First Name: ' . $first->name;
            
            $last  = Customer::last();
            print 'Last ID:   ' . $last->id;
            print 'Last Name: ' . $last->name;
            
            TTransaction::close(); // closes transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
