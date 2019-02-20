<?php
/**
 * Item Active Record
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Item extends TRecord
{
    const TABLENAME = 'item';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
    
    private $status;
    private $book;
    
    /**
     * Returns the Item from its barcode
     */
    public static function newFromBarcode($barcode)
    {
        $rep = new TRepository('Item');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('barcode', '=', $barcode));
        $objects = $rep->load($criteria);
        if ($objects)
        {
            $item = $objects[0];
            return $item;
        }
    }
    
    /**
     * Returns the status description
     */
    function get_status_description()
    {
        if (empty($this->status))
        {
            $this->status = new Status($this->status_id);
        }
        return $this->status->description;
    }
    
    /**
     * Returns the book title
     */
    function get_title()
    {
        if (empty($this->book))
        {
            $this->book = new Book($this->book_id);
        }
        return $this->book->title;
    }
    
    /**
     *
     */
    function get_book()
    {
        if (empty($this->book))
        {
            $this->book = new Book($this->book_id);
        }
        return $this->book;
    }
}
