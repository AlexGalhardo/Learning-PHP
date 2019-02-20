<?php
/**
 * BookAuthor Active Record
 *
 * @version    1.0
 * @package    samples
 * @subpackage library
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006-2011 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class BookAuthor extends TRecord
{
    const TABLENAME = 'book_author';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
}
?>