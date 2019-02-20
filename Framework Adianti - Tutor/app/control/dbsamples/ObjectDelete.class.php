<?php
class ObjectDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            $customer = new Customer(40);
            $customer->delete(); // exclui o objeto
            
            $customer = new Customer;
            $customer->delete(41); // exclui o objeto
            new TMessage('info', 'Objeto excluído');
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>