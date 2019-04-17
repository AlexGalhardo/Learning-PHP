<?php 
class CollectionStaticBatchUpdate extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); 
            
            Customer::where('id', 'IN', [1,2,3,4])
                    ->where('status', '=', 'C')
                    ->set('gender', 'M')
                    ->update();
                    
            new TMessage('info', 'Records updated'); 
            TTransaction::close(); 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
