<?php
class ObjectLoad extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // load customer, throw exception if not found
            $customer = new Customer(4);
            echo 'Name      : ' . $customer->name     . "<br>\n";
            echo 'Address   : ' . $customer->address  . "<br>\n";
            echo "<br>\n";
            
            // load customer, throw exception if not found
            $customer = new Customer(25);
            echo 'Name      : ' . $customer->name     . "<br>\n";
            echo 'Address   : ' . $customer->address  . "<br>\n";
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
