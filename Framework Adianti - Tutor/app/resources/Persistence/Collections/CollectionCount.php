<?php 
class CollectionCount extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); 
            $criteria = new TCriteria; 
            $criteria->add(new TFilter('name', 'like', 'Rafael%'),
                                         TExpression::OR_OPERATOR); 
            $criteria->add(new TFilter('name', 'like', 'Ana%'),
                                         TExpression::OR_OPERATOR); 
            
            $repository = new TRepository('Customer'); 
            $count = $repository->count($criteria); 
             
            new TMessage('info', "Total of found customers: {$count} <br>\n"); 
            TTransaction::close(); 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
