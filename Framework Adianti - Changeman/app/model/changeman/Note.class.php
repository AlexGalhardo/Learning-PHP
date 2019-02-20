<?php
/**
 * Note Active Record
 * @author  <your-name-here>
 */
class Note extends TRecord
{
    const TABLENAME = 'note';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
}
?>