<?php

namespace App\MethodFactory\Accounts;

use App\MethodFactory\Accounts\Interfaces\AccountInterface;
use App\Models\ThirdAccount as ModelsThirdAccount;
use Illuminate\Support\Facades\Auth;

class ThirdAccount implements AccountInterface
{
    const IS_ACTIVE = true;

    private ModelsThirdAccount $thirdAccount;
    
    public function __construct()
    {
        $this->thirdAccount = new ModelsThirdAccount();
    }

    public function create(array $data)
    {

        return $this->thirdAccount->create([
            'idaccount' => $data['idaccount'],
            'description' => $data['description'],
            'balance' => 0,
            'name_third' => $data['name_third'],
            'created_by_id' => Auth::user()->nit,
            'is_active' => self::IS_ACTIVE,
        ]);

    }

    public function get()
    {
        return $this->thirdAccount->where('is_active',self::IS_ACTIVE)->get();
    }

    // public static function transaction(): void
    // {
    //     // TODO: Implement transaction() method.
    // }
}