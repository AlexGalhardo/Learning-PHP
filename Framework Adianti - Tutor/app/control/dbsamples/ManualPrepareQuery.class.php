<?php
class ManualPrepareQuery extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transação
            $conn = TTransaction::get(); // obtém a conexão
            
            $sth = $conn->prepare('SELECT id, name from customer
                                   WHERE id >= ? AND id <= ?');
            
            $sth->execute(array(3,12));
            $result = $sth->fetchAll();
            
            // exibe os resultados
            foreach ($result as $row)
            {
                print $row['id'] . '-';
                print $row['name'] . "<br>\n";
            }
            TTransaction::close(); // fecha a transação.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
