<?php

namespace App\MethodFactory\Accounts;

use App\MethodFactory\Accounts\Interfaces\AccountInterface;
use App\Models\Account as ModelsAccount;
use Illuminate\Support\Facades\Auth;

class OwnAccount implements AccountInterface
{
    private ModelsAccount $account;

    public function __construct()
    {
        $this->account = new ModelsAccount();
    }

    public function create(array $data)
    {

        return $this->account->create([
            'idaccount' => $data['idaccount'],
            'description' => $data['description'],
            'balance' => $data['balance'],
            'created_by_id' => Auth::user()->nit,
            'is_active' => true,
        ]);
    }

    public function get()
    {
        return $this->account->where('created_by_id', Auth::user()->nit)->paginate('4');
    }

    public static function transaction(): void
    {
        // TODO: Implement transaction() method.
    }
}