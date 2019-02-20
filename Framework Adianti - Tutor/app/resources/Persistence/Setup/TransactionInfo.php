<?php 
class TransactionInfo extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction
            
            print TTransaction::getDatabase(); // current database
            
            echo '<br>';
            
            print_r(TTransaction::getDatabaseInfo()); // current db info
             
            TTransaction::close(); // close transaction 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
