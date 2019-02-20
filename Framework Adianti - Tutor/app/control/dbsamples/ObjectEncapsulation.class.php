<?php
class ObjectEncapsulation extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transa��o
            $giovani = new Customer;
            $giovani->name        = 'Giovanni Dall Oglio';
            $giovani->birthdate   = '2013-32-40';
            
            new TMessage('info', 'Objeto armazenado com sucesso');
            TTransaction::close(); // fecha a transa��o.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>