<?php

namespace App\MethodFactory\Accounts\Factory;


use App\MethodFactory\Accounts\Interfaces\FactoryAccountInterface;
use App\MethodFactory\Accounts\ThirdAccount;

class FactoryThirdAccount implements FactoryAccountInterface
{
    private $thirdAccount;

    public function __construct(ThirdAccount $thirdAccount)
    {
        $this->thirdAccount = $thirdAccount;
    }

    public function create(array $data)
    {
        return $this->thirdAccount->create($data);
    }

    public function get()
    {
        return $this->thirdAccount->get();
    }
}