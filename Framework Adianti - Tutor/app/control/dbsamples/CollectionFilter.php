<?php
class CollectionFilter extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // load customers
            $list = Customer::where('id', '>', '1')->filter( function($object) {
              return ( (strpos($object->gender, 'F') !== false)
                   AND (strpos($object->birthdate, '1990') !== false) );
            }, false);
                                 
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
