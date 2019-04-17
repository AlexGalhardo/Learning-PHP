<?php
class ObjectLoad2 extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            $loader = new Customer;
            // load customer, returns FALSE if not found
            $customer = $loader->load(4);
            
            if ($customer instanceof Customer)
            {
                echo 'Name      : ' . $customer->name     . "<br>\n";
                echo 'Address   : ' . $customer->address  . "<br>\n";
            }
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
