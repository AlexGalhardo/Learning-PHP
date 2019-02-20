<?php
class CollectionSimpleDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            
            // inicia o repositório
            $repository = new TRepository('Customer');
            // deleta os clientes
            $repository->where('address', 'like', 'Rua Porto%')
                        ->where('gender',  '=', 'M')
                        ->delete();
            
            new TMessage('info', 'Registros excluídos');
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>