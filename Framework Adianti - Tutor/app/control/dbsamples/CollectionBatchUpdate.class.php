<?php 
class CollectionBatchUpdate extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); 
            
            $repos = new TRepository('Customer');
            $criteria = new TCriteria;
            $criteria->add(new TFilter('id', 'IN', [1,2,3,4]));
            $criteria->add(new TFilter('status', '=', 'C'));
            
            $values = array('gender' => 'F');
            $repos->update($values, $criteria);
                    
            new TMessage('info', 'Records updated'); 
            TTransaction::close(); 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
