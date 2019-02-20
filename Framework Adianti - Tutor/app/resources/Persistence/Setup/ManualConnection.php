<?php
class ManualConnection extends TPage
{
    public function __construct()
    {
        parent::__construct();
        try
        {
            // connection info
            $db = array();
            $db['host'] = '';
            $db['port'] = '';
            $db['name'] = 'app/database/samples.db';
            $db['user'] = '';
            $db['pass'] = '';
            $db['type'] = 'sqlite';
            
            TTransaction::open(NULL, $db); // open transaction
            $conn = TTransaction::get(); // get PDO connection
            
            // make query
            $result = $conn->query('SELECT id, name from customer order by id');
            
            // iterate results
            foreach ($result as $row)
            {
                print $row['id'] . '-';
                print $row['name'] . "<br>\n";
            }
            TTransaction::close(); // close transaction
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
