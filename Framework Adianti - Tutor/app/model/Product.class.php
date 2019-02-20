<?php
/**
 * Product Active Record
 * @author  Pablo Dall'Oglio
 */
class Product extends TRecord
{
    const TABLENAME = 'product';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        
        parent::addAttribute('description');
        parent::addAttribute('stock');
        parent::addAttribute('sale_price');
        parent::addAttribute('unity');
        parent::addAttribute('photo_path');
    }
}
?>