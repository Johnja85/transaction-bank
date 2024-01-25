<?php

namespace App\MethodFactory\Accounts\Factory;


use App\MethodFactory\Accounts\Interfaces\FactoryAccountInterface;
use App\MethodFactory\Accounts\ThirdAccount;

class FactoryThirdAccount implements FactoryAccountInterface
{

    public static function createAccount(array $data)
    {
        $thirdAccount = new ThirdAccount();

        return $thirdAccount->createAccount($data);
    }

    // public static function transaction():void
    // {
        
    // }


}