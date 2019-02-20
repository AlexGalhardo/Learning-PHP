<?php 
class ManualQuery extends TPage
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        try 
        { 
            TTransaction::open('samples'); // open transaction
            $conn = TTransaction::get(); // get PDO connection
            
            // run query
            $result = $conn->query('SELECT id, name from customer order by id');
            
            // show results 
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
