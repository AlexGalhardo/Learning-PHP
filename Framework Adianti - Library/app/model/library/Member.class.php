<?php
/**
 * Member Active Record
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Member extends TRecord
{
    const TABLENAME = 'member';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    private $city;     // City Active Record
    private $category; // Category Active Record
    
    /**
     * Returns the city name for the current member
     * Executed whenever the property "city" is accessed
     */
    function get_city_name()
    {
        if (empty($this->city))
            $this->city = new City($this->city_id);
        
        return $this->city->name;
    }
    
    /**
     * Returns the category name for the current member
     * Executed whenever the property "category_description" is accessed
     */
    function get_category_description()
    {
        if (empty($this->category))
            $this->category = new Category($this->category_id);
        
        return $this->category->description;
    }
}
?>