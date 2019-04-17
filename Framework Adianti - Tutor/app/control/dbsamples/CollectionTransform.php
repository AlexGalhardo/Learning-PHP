<?php
class CollectionTransform extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // load customers
            $list = Customer::where('id', '>', 1)->transform( function($object) {
                $object->name    = 'Dear '. strtoupper($object->name);
                $object->address = strtoupper($object->address);
            });
                                 
            foreach ($list as $customer)
            {
                echo $customer->id . ' - ' . $customer->name . ' - ' . $customer->address. '<br>';
            }
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
