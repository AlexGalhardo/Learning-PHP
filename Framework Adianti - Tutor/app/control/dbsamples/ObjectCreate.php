<?php 
class ObjectCreation extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction 
            
            Customer::create( [ 'name' => 'Antonio Dall Oglio',
                                'address' => 'Rua da Conceicao',
                                'phone' => '(51) 8111-2222',
                                'birthdate' => '2013-02-15',
                                'status' => 'S',
                                'email' => 'antonio@dalloglio.net',
                                'gender' => 'M',
                                'category_id' => '1',
                                'city_id' => '1' ]);
                                
            new TMessage('info', 'Object stored successfully'); 
            TTransaction::close(); // Closes the transaction 
        } 
        catch (Exception $e) 
        { 
            new TMessage('error', $e->getMessage()); 
        } 
    } 
} 
