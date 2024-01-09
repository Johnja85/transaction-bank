<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository implements AccountRespositoryInterface
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function store($data)
    {
        $this->account->store($data);
    }
}