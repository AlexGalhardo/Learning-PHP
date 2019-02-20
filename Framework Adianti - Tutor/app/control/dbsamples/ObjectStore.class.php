<?php
class ObjectStore extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            
            // cria novo objeto
            $giovani = new Customer;
            $giovani->name        = 'Giovanni Dall Oglio';
            $giovani->address     = 'Rua da Conceicao';
            $giovani->phone       = '(51) 8111-2222';
            $giovani->birthdate   = '2013-02-15';
            $giovani->status      = 'S';
            $giovani->email       = 'giovanni@dalloglio.net';
            $giovani->gender      = 'M';
            $giovani->category_id = '1';
            $giovani->city_id     = '1';
            $giovani->store(); // armazena o objeto
            
            new TMessage('info', 'Objeto armazenado com sucesso');
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
?>