<?php
/**
 * Loan Active Record
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class Loan extends TRecord
{
    const TABLENAME = 'loan';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    private $member;
    private $book;
    private $item;
    
    /**
     * Get the last loan (not arrived) from a barcode
     */
    public static function getFromBarcode($barcode)
    {
        $rep = new TRepository('Loan');
        $criteria = new TCriteria;
        $criteria->add(new TFilter('item_id',     '=', "(SELECT id from item where barcode='$barcode')"));
        $criteria->add(new TFilter('arrive_date', 'is', NULL));
        $objects = $rep->load($criteria);
        if ($objects)
        {
            $loan = $objects[0];
            return $loan;
        }
    }
    
    /**
     * Returns the member name for the current Loan
     * Executed whenever the property "member_name" is accessed
     */
    function get_member_name()
    {
        if (empty($this->member))
            $this->member = new Member($this->member_id);
        
        return $this->member->name;
    }
    
    /**
     * Returns the item
     * Executed whenever the property "book_title" is accessed
     */
    function get_item()
    {
        if (empty($this->item))
        {
            $this->item = Item::find($this->item_id);
        }
        
        return $this->item;
    }
    
    /**
     * Returns the book title for the current Loan
     * Executed whenever the property "book_title" is accessed
     */
    function get_book_title()
    {
        if (empty($this->book))
        {
            $item = Item::find($this->item_id);
            $this->book = new Book($item->book_id);
        }
        
        return $this->book->title;
    }
}
