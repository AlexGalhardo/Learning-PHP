<?php
class TestPage extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            TTransaction::open('samples');
            $sql = 'SELECT name, address FROM customer WHERE name like :name';
            
            $conn = TTransaction::get();
            $result = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $result->execute(array(':name' => 'And%'));
            var_dump($result->fetchAll());
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
