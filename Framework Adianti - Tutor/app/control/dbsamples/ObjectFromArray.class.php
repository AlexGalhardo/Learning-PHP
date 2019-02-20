<?php 
class ObjectFromArray extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction
            
            // Convert an Active Record into array
            $customer = new Customer(4);
            print_r($customer->toArray());
            
            // Using an array to fill the Active Record
            $test = array();
            $test['name'] = 'Customer from array';
            $test['address'] = 'Address from array';
            $test['category_id'] = 1;
            $test['city_id'] = 1;
            $test['birthdate'] = date('Y-m-d');
            
            $customer2 = new Customer;
            $customer2->fromArray($test);
            $customer2->store(); 
            
            TTransaction::close(); // closes transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
?>
