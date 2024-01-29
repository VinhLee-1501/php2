<?php

namespace App\Core;

class ValidatorLab5
{
    public function emptyInput($email, $userCard)
    {
        return empty($email) && empty($userCard);
    }

    public function validEmail($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function emailUser($email)
    {

    }
}