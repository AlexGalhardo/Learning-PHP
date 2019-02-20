<?php
class CollectionLoadProperty extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // open transaction
            $criteria = new TCriteria;

            // define criteria properties
            $criteria->setProperty('limit' , 10);
            $criteria->setProperty('offset', 20);
            $criteria->setProperty('order' , 'id');
            
            $repository = new TRepository('Customer');
            $customers = $repository->load($criteria);
            
            foreach ($customers as $customer)
            {
                echo $customer->id . ' - ' . $customer->name . '<br>';
            }
            TTransaction::close(); // close transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
