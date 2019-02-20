<?php
class CollectionUpdate extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // load customers
            $customers = Customer::where('city_id', '=', '4')->load();
            
            foreach ($customers as $customer)
            {
                // update record
                $customer->phone = '84 '.substr($customer->phone, 3);
                $customer->store();
            }
            new TMessage('info', 'Records updated');
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
