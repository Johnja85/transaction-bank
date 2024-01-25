<?php

namespace App\MethodFactory\Accounts;

use App\MethodFactory\Accounts\Interfaces\AccountInterface;
use App\Models\Account as ModelsAccount;
use Illuminate\Support\Facades\Auth;

class OwnAccount implements AccountInterface
{
    public static function createAccount(array $data)
    {

        return ModelsAccount::create([
            'idaccount' => $data['idaccount'],
            'description' => $data['description'],
            'balance' => $data['balance'],
            'created_by_id' => Auth::user()->nit,
            'is_active' => $data['active'],
        ]);
    }

    public static function transaction(): void
    {
        // TODO: Implement transaction() method.
    }
}