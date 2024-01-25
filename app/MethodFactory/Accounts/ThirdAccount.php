<?php

namespace App\MethodFactory\Accounts;

use App\MethodFactory\Accounts\Interfaces\AccountInterface;
use App\Models\ThirdAccount as ModelsThirdAccount;
use Illuminate\Support\Facades\Auth;

class ThirdAccount implements AccountInterface
{
    public static function createAccount(array $data)
    {

        return ModelsThirdAccount::create([
            'idaccount' => $data['idaccount'],
            'description' => $data['description'],
            'name_third' => $data['name_third'],
            'created_by_id' => Auth::user()->nit,
            'is_active' => $data['active'],
        ]);

    }

    public static function transaction(): void
    {
        // TODO: Implement transaction() method.
    }
}