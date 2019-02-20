<?php 
class CollectionDelete extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); 
            $criteria = new TCriteria; 
            $criteria->add(new TFilter('address', 'like', 'Rua Porto%')); 
            $criteria->add(new TFilter('gender',  '=', 'M')); 
            $repository = new TRepository('Customer'); 
            $repository->delete($criteria); 
            
            new TMessage('info', 'Records Deleted'); 
            TTransaction::close(); 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
