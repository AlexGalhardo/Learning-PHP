<?php
/**
 * SaleItem Active Record
 * @author  <your-name-here>
 */
class SaleItem extends TRecord
{
    const TABLENAME = 'sale_item';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $product;

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('sale_price');
        parent::addAttribute('amount');
        parent::addAttribute('discount');
        parent::addAttribute('total');
        parent::addAttribute('product_id');
        parent::addAttribute('sale_id');
    }

    
    /**
     * Method set_product
     * Sample of usage: $sale_item->product = $object;
     * @param $object Instance of Product
     */
    public function set_product(Product $object)
    {
        $this->product = $object;
        $this->product_id = $object->id;
    }
    
    /**
     * Method get_product
     * Sample of usage: $sale_item->product->attribute;
     * @returns Product instance
     */
    public function get_product()
    {
        // loads the associated object
        if (empty($this->product))
            $this->product = new Product($this->product_id);
    
        // returns the associated object
        return $this->product;
    }


}
?>