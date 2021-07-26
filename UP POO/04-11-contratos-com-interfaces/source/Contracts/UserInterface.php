<?php

namespace Source\Contracts;

interface UserInterface
{
    //public function __construct($firstName, $lastName, $email, $passwd);

    //public function setEmail($email);

    public function getFirstName();

    public function getLastName();

    public function getEmail();
}