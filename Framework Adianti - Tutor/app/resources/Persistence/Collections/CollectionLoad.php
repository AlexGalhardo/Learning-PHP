<?php 
class CollectionLoad extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        {
            TTransaction::open('samples'); // open transaction
            
            // query criteria
            $criteria = new TCriteria; 
            $criteria->add(new TFilter('gender', '=', 'F')); 
            $criteria->add(new TFilter('status', '=', 'M')); 
            
            // load using repository
            $repository = new TRepository('Customer'); 
            $customers = $repository->load($criteria); 
            
            foreach ($customers as $customer) 
            { 
                echo $customer->id . ' - ' . $customer->name . '<br>'; 
            }
            
            TTransaction::close(); // close transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
