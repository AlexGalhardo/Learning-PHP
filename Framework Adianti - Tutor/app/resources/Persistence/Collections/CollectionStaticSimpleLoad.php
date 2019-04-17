<?php
class CollectionStaticSimpleLoad extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // load customers
            $customers = Customer::where('gender', '=', 'M')
                                 ->where('name', 'like', 'A%')
                                 ->load();
                                 
            foreach ($customers as $customer)
            {
                echo $customer->id . ' - ' .
                     $customer->name . ' - ' . 
                     $customer->address . '<br>';
            }
            
            echo '<br><br>';
            // load customers, with just two attributes
            $customers = Customer::select('id', 'name')
                                 ->where('gender', '=', 'M')
                                 ->where('name', 'like', 'A%')
                                 ->load();
                                 
            foreach ($customers as $customer)
            {
                echo $customer->id . ' - ' . $customer->name . '<br>';
            }
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
