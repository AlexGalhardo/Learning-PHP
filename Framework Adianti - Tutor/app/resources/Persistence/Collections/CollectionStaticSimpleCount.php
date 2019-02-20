<?php
class CollectionStaticSimpleCount extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            // count customers
            $count = Customer::where('gender', '=', 'M')
                             ->where('name', 'like', 'A%')
                             ->count();
                                 
            print( $count );
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
