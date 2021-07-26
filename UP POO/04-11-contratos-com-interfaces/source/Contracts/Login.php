<?php

namespace Source\Contracts;

class Login
{
    private $logged;

    /**
     * @param User $user
     * @return User
     */
    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdmin $user
     * @return UserAdmin
     */
    public function loginAdmin(UserAdmin $user): UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }


    public function login(UserInterface $user): UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}