<?php
class ManualQuery extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            TTransaction::open('samples'); // abre uma transa��o
            $conn = TTransaction::get(); // obt�m a conex�o
            
            // realiza a consulta
            $result = $conn->query('SELECT id, name from customer order by id');
            
            // exibe os resultados
            foreach ($result as $row)
            {
                print $row['id'] . '-';
                print $row['name'] . "<br>\n";
            }
            TTransaction::close(); // fecha a transa��o.
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
