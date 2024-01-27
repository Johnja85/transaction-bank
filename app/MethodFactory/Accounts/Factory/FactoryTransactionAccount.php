<?php

namespace App\MethodFactory\Accounts\Factory;

use App\MethodFactory\Accounts\Interfaces\TransactionAccountsInterface;

use App\MethodFactory\Accounts\TransactionAccount;
use App\Models\Account;
use App\Models\ThirdAccount;

class FactoryTransactionAccount implements TransactionAccountsInterface
{
    private ThirdAccount $thirdAccount;
    private Account $ownAccount;
    private $transactionAccount;
    
    public function __construct(TransactionAccount $transactionAccount)
    {
        $this->ownAccount = new Account();
        $this->thirdAccount = new ThirdAccount();
        $this->transactionAccount = $transactionAccount;
    }

    public function create(array $data)
    {
        if ($data['type'] == "own") {
            
            return $this->transactionAccount->create($data, $this->ownAccount, $this->ownAccount);
        }else{
            
            return $this->transactionAccount->create($data, $this->ownAccount, $this->thirdAccount);
        }
    }

    public function get()
    {
        return $this->transactionAccount->get();
    }
}