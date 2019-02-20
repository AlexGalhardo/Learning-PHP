<?php
class CollectionCountObjects extends TPage
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
            
            print( Customer::countObjects($criteria) );
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
