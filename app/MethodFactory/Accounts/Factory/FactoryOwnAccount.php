<?php

namespace App\MethodFactory\Accounts\Factory;

use App\MethodFactory\Accounts\Interfaces\FactoryAccountInterface;
use App\MethodFactory\Accounts\OwnAccount;

class FactoryOwnAccount implements FactoryAccountInterface
{
    public static function createAccount(array $data)
    {
        $ownAccount = new OwnAccount();

        return $ownAccount->createAccount($data);
    }

    // public static function transaction():void
    // {
    //     // TODO: Implement block() method.
    // }


}