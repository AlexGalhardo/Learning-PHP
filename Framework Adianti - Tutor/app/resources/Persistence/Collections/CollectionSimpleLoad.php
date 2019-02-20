<?php
class CollectionSimpleLoad extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            $repository = new TRepository('Customer');
            $customers = $repository->where('gender', '=', 'M')
                                     ->where('name', 'like', 'A%')
                                     ->load();
            
            foreach ($customers as $customer)
            {
                echo $customer->id . ' - ' . $customer->name . '<br>';
            }
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
