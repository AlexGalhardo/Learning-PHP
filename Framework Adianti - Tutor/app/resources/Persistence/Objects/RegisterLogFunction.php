<?php 
class RegisterLogFunction extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); 
            // define log 
            TTransaction::setLoggerFunction( function($message)
                                             {
                                                 echo $message . '<br>';
                                             });
            
            TTransaction::log("inserting city..."); 
            $cidade = new City; 
            $cidade->name = 'Porto Alegre'; 
            $cidade->store();
             
            TTransaction::close(); // close transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
