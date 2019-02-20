<?php
/**
 * Post Active Record
 * @author  <your-name-here>
 */
class Post extends TRecord
{
    const TABLENAME = 'post';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $category;

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('title');
        parent::addAttribute('body');
        parent::addAttribute('keywords');
        parent::addAttribute('date');
        parent::addAttribute('category_id');
    }

    /**
     * Method get_category_name
     * Sample of usage: $post->category->attribute;
     * @returns Category instance
     */
    public function get_category_name()
    {
        // loads the associated object
        if (empty($this->category))
            $this->category = new Category($this->category_id);
    
        // returns the associated object
        return $this->category->name;
    }

    static public function listForCategory($category_id)
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('category_id', '=', $category_id));
        
        $repos = new TRepository('Post');
        return $repos->load($criteria);
    }
}
?>