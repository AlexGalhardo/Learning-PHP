<?php 
/** 
 * Active Record for Customer
 */ 
class Customer extends TRecord
{
    // ... another methods

    public function set_birthdate($value)
    { 
        $parts = explode('-', $value); 
        if (checkdate($parts[1], $parts[2], $parts[0])) 
        { 
            $this->data['birthdate'] = $value; 
        } 
        else 
        { 
            throw new Exception("Cannot assign '{$value}' to birthdate"); 
        } 
    } 
} 
