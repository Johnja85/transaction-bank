<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountRepository implements AccountRespositoryInterface
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function store($data)
    {
        $this->account->create([
            "idaccount" => $data['idaccount'],
            "description" => $data['description'],
            "balance" => $data['balance'],
            "created_by_id" => Auth::user()->nit,
            "active" => $data['active']
        ]);
    }
}