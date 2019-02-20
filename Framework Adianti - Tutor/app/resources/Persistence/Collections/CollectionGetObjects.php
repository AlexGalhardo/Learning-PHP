<?php
class CollectionGetObjects extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            $criteria = new TCriteria;
            $criteria->add( new TFilter( 'gender', '=', 'M' ));
            $criteria->add( new TFilter( 'name', 'like', 'A%' ));
            
            $customers = Customer::getObjects($criteria);
            
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
