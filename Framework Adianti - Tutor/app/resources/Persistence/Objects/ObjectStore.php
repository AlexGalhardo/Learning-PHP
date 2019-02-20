<?php 
class ObjectStore extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction 
            
            // create a new object
            $giovani = new Customer; 
            $giovani->name        = 'Giovanni Dall Oglio'; 
            $giovani->address     = 'Rua da Conceicao'; 
            $giovani->phone       = '(51) 8111-2222'; 
            $giovani->birthdate   = '2013-02-15'; 
            $giovani->status      = 'S'; 
            $giovani->email       = 'giovanni@dalloglio.net'; 
            $giovani->gender      = 'M'; 
            $giovani->category_id = '1'; 
            $giovani->city_id     = '1'; 
            $giovani->store(); // store the object 
            
            new TMessage('info', 'Object stored successfully'); 
            TTransaction::close(); // Closes the transaction 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
