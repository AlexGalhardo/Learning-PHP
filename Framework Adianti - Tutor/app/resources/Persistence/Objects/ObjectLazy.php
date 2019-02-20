<?php
/**
 * Customer class
 * Active Record for customer table
 */
class Customer extends TRecord
{
    const TABLENAME = 'customer';
    const PRIMARYKEY= 'id';
    const IDPOLICY  = 'serial'; // (max,serial)
    
    private $city;
    
    /**
     * executed whenever the property "city_name" is accessed
     */
    function get_city_name()
    {
        // instantiates City, load $this->city_id
        if (empty($this->city))
        {
            $this->city = new City($this->city_id);
        }
        
        // returns the City Active Record
        return $this->city->name;
    }
}

$object = new Customer(1);
print $object->city_name;  // calls get_city_name()
