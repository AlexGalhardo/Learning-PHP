<?php
class CollectionSimpleCount extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples');
            $repository = new TRepository('Customer');
            $count = $repository->where('name', 'like', 'Rafael%',
                                          TExpression::OR_OPERATOR)
                                 ->where('name', 'like', 'Ana%',
                                          TExpression::OR_OPERATOR)
                                 ->count();
            
            new TMessage('info', "Total of found customers: {$count} <br>\n");
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
