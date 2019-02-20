<?php 
class RegisterLog extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction 
            // define log
            TTransaction::setLogger(new TLoggerTXT('/tmp/log.txt')); 
            TTransaction::log("** inserting city"); 
            
            $cidade = new City; // create new object 
            $cidade->name = 'Porto Alegre';
            $cidade->state_id = '1'; 
            $cidade->store(); // store the object
            
            new TMessage('info', 'Object stored successfully'); 
            TTransaction::close(); // close transaction
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
