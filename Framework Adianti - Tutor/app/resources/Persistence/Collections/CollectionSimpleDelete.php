<?php
class CollectionSimpleDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            $repository = new TRepository('Customer');
            $repository->where('address', 'like', 'Rua Porto%')
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
