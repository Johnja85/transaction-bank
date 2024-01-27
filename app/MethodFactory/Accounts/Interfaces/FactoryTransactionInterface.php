<?php

namespace App\MethodFactory\Accounts\Interfaces;


interface FactoryTransactionInterface
{
    public function create(array $data, $accountOrigin, $accountDestination);

    public function get();
}