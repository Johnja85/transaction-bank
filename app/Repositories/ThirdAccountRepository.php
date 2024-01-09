<?php

namespace App\Repositories;

use App\Models\Third_account;
use Illuminate\Support\Facades\Auth;

class ThirdAccountRepository implements AccountRespositoryInterface
{
    protected $thirdAccount;

    public function __construct(Third_account $thirdAccount)
    {
        $this->thirdAccount = $thirdAccount;
    }
    public function store($data)
    {
        return $this->thirdAccount->create([
            'idaccount' => $data['idaccount'],
            'description' => $data['description'],
            'name_third' => $data['name_third'],
            'created_by_id' => Auth::user()->nit,
            'active' => $data['active']
        ]);
    }
}
