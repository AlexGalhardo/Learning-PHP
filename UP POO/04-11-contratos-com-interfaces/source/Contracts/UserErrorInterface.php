<?php

namespace Source\Contracts;

interface UserErrorInterface
{
    public function setError($error);

    public function getError();
}