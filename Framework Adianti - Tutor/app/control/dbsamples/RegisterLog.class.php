<?php
class RegisterLog extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            // define o log
            TTransaction::setLogger(new TLoggerTXT('/tmp/log.txt'));
            TTransaction::log("** inserindo cidade");
            
            $cidade = new City; // cria novo objeto
            $cidade->name = 'Porto Alegre';
            $cidade->state_id = '1'; 
            $cidade->store(); // armazena o objeto
            
            new TMessage('info', 'Objeto armazenado com sucesso');
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
