<?php

namespace App\MethodFactory\Accounts\Interfaces;


interface TransactionAccountsInterface
{
    public function create(array $data);

    public function get();

}