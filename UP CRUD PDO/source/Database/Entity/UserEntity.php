<?php

namespace Source\Database\Entity;

class UserEntity
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $document;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }


}