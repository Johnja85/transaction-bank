<?php

namespace App\MethodFactory\Accounts\Factory;

use App\MethodFactory\Accounts\Interfaces\FactoryAccountInterface;
use App\MethodFactory\Accounts\OwnAccount;

class FactoryOwnAccount implements FactoryAccountInterface
{
    private $ownAccount;
    
    public function __construct(OwnAccount $ownAccount)
    {
        $this->ownAccount = $ownAccount;
    }

    public function create(array $data)
    {
        return $this->ownAccount->create($data);
    }

    public function get()
    {
        return $this->ownAccount->get();
    }
}