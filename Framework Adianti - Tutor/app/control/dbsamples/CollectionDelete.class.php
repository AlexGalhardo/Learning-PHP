<?php
class CollectionDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            TTransaction::setLogger(new TLoggerTXT('/tmp/log3.txt'));
            $criteria = new TCriteria;
            $criteria->add(new TFilter('address', 'like', 'Rua Porto%'));
            $criteria->add(new TFilter('gender',  '=', 'M'));
            $repository = new TRepository('Customer');
            $repository->delete($criteria);
            
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