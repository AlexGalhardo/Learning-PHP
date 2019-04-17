<?php 
class CollectionSimpleLoadProperty extends TPage 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction 
            
            // load odered by id, limit 10 offset 20
            $customers = Customer::orderBy('id')->take(10)->skip(20)->load();
            if ($customers)
            {
                foreach ($customers as $customer) 
                { 
                    echo $customer->id . ' - ' . $customer->name . '<br>'; 
                } 
            }
            
            echo '<br>';
            
            var_dump( Customer::orderBy('id')->first()->toArray() );
            
            TTransaction::close(); // close transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
