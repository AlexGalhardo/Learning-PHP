<?php
class CollectionStaticSimpleDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            
            Customer::where('address', 'like', 'Rua Porto%')
                        ->where('gender',  '=', 'M')
                        ->delete();
            
            new TMessage('info', 'Records Deleted'); 
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
