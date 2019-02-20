<?php
class CollectionCount extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            $criteria = new TCriteria;
            $criteria->add(new TFilter('name', 'like', 'Rafael%'), TExpression::OR_OPERATOR);
            $criteria->add(new TFilter('name', 'like', 'Ana%'), TExpression::OR_OPERATOR);
            
            $repository = new TRepository('Customer');
            $count = $repository->count($criteria);
            
            new TMessage('info', "Total de clientes encontrados: {$count} <br>\n");
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>