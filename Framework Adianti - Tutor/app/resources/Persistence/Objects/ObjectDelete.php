<?php
class ObjectDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // open transaction 
            $customer = new Customer(40); // load object
            $customer->delete(); // delete object
            
            $customer = new Customer;
            $customer->delete(41); // delete object 
            new TMessage('info', 'Object deleted'); 
            TTransaction::close(); // close transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
