<?php
/**
 * Sale Active Record
 * @author  <your-name-here>
 */
class Sale extends TRecord
{
    const TABLENAME = 'sale';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    private $customer;
    private $sale_items;

    /**
     * Constructor method
     */
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        parent::addAttribute('date');
        parent::addAttribute('total');
        parent::addAttribute('obs');
        parent::addAttribute('customer_id');
    }

    
    /**
     * Method set_customer
     * Sample of usage: $sale->customer = $object;
     * @param $object Instance of Customer
     */
    public function set_customer(Customer $object)
    {
        $this->customer = $object;
        $this->customer_id = $object->id;
    }
    
    /**
     * Method get_customer
     * Sample of usage: $sale->customer->attribute;
     * @returns Customer instance
     */
    public function get_customer()
    {
        // loads the associated object
        if (empty($this->customer))
            $this->customer = new Customer($this->customer_id);
    
        // returns the associated object
        return $this->customer;
    }
    
    /**
     * Method get_customer_name
     */
    public function get_customer_name()
    {
        return $this->get_customer()->name;
    }
    
    /**
     * Method addSaleItem
     * Add a SaleItem to the Sale
     * @param $object Instance of SaleItem
     */
    public function addSaleItem(SaleItem $object)
    {
        $this->sale_items[] = $object;
    }
    
    /**
     * Method getSaleItems
     * Return the Sale' SaleItem's
     * @return Collection of SaleItem
     */
    public function getSaleItems()
    {
        return $this->sale_items;
    }

    /**
     * Reset aggregates
     */
    public function clearParts()
    {
        $this->sale_items = array();
    }

    /**
     * Load the object and its aggregates
     * @param $id object ID
     */
    public function load($id)
    {
    
        // load the related SaleItem objects
        $repository = new TRepository('SaleItem');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('sale_id', '=', $id));
        $this->sale_items = $repository->load($criteria);
    
        // load the object itself
        return parent::load($id);
    }

    /**
     * Store the object and its aggregates
     */
    public function store()
    {
        // store the object itself
        parent::store();
    
        // delete the related SaleItem objects
        $criteria = new TCriteria;
        $criteria->add(new TFilter('sale_id', '=', $this->id));
        $repository = new TRepository('SaleItem');
        $repository->delete($criteria);
        // store the related SaleItem objects
        if ($this->sale_items)
        {
            foreach ($this->sale_items as $sale_item)
            {
                unset($sale_item->id);
                $sale_item->sale_id = $this->id;
                $sale_item->store();
            }
        }
    }

    /**
     * Delete the object and its aggregates
     * @param $id object ID
     */
    public function delete($id = NULL)
    {
        // delete the related SaleItem objects
        $id = isset($id) ? $id : $this->id;
        $repository = new TRepository('SaleItem');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('sale_id', '=', $id));
        $repository->delete($criteria);
        
    
        // delete the object itself
        parent::delete($id);
    }

    public static function getCustomerSales($customer_id)
    {
        $repository = new TRepository('Sale');
        return $repository->where('customer_id', '=', $customer_id)->load();
    }
}
?>