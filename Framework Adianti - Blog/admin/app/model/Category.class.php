<?php
/**
 * Category Active Record
 * @author  <your-name-here>
 */
class Category extends TRecord
{
    const TABLENAME = 'category';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('name');
    }
    
    static public function getFirst()
    {
        $conn = TTransaction::get(); // get PDO connection
            
        // run query
        $result = $conn->query('SELECT min(id) as min from category');
        
        // show results 
        foreach ($result as $row) 
        { 
            return $row['min']; 
        } 
    }
    
    static public function listAll()
    {
        $repos = new TRepository('Category');
        return $repos->load(new TCriteria);
    }
}
?>