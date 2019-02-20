<?php 
class ObjectUpdate extends TPage 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            // open transaction 
            TTransaction::open('samples');

            // find customer
            $customer = Customer::find(31);

            // check if found
            if ($customer) 
            { 
                $customer->phone = '51 8111-3333'; // change phone number
                $customer->store(); // stores the object
            } 

            new TMessage('info', 'Object updated'); 
            TTransaction::close(); // close transaction 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
}