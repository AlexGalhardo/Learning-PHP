<?php 
class ObjectToJson extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples');
            
            // Load object
            $customer = Customer::find(4);
            
            // if found
            if ($customer)
            {
                // show as JSON
                print_r( $customer->toJson() );
            }
            
            TTransaction::close();
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
}
