<?php
class CollectionSimpleCount extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            // inicia o repositório
            $repository = new TRepository('Customer');
            // conta os clientes
            $count = $repository->where('name', 'like', 'Rafael%', TExpression::OR_OPERATOR)
                                 ->where('name', 'like', 'Ana%', TExpression::OR_OPERATOR)
                                 ->count();
            
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