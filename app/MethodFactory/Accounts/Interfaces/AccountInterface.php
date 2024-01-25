<?php

namespace App\MethodFactory\Accounts\Interfaces;

interface AccountInterface
{

    public static function createAccount(array $data);

    public static function transaction():void;
}