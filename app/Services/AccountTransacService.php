<?php

namespace App\Services;

use App\Models\Account;
use App\Models\ThirdAccount;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AccountTransacService
{
    const ACTIVE = 'yes';
    const INACTIVE = 'yes';

    protected Account $account;
    protected ThirdAccount $thirdAccount;
    protected Transaction $transactions;

    public function __construct(Account $account, ThirdAccount $thirdAccount, Transaction $transactions)
    {
        $this->account = $account;
        $this->thirdAccount = $thirdAccount;
        $this->transactions = $transactions;
    }

    public function getByPaginate($model)
    {
        try{
            if (!class_exists($model) || !is_subclass_of($model, Model::class)) {
                throw new \InvalidArgumentException('Clase de modelo no válida');
            }

            return $model::where('created_by_id', Auth::user()->nit)->paginate('4');

        }catch(\Exception $e){
            return [
                'error' => true,
                'message' => 'Error al intentar almacenar el registro: ' . $e->getMessage(),
            ];
        }
    }

    public function storeAccount($request)
    {
        try{
            $this->account->create([
                'idaccount' => $request->idaccount,
                'description' => $request->description,
                'balance' => $request->balance,
                'created_by_id' => Auth::user()->nit,
                'active' => $request->active
            ]);
    
            return true;
        }catch(\Exception $e){
            return [
                'error' => true,
                'message' => 'Error al intentar almacenar el registro: ' . $e->getMessage(),
            ];
        }
         
    }

    public function getAccount()
    {
        return $this->account
            ->where('created_by_id', Auth::user()->nit)
            ->where('active', static::ACTIVE)
            ->get();
    }

    public function getThirdAccount()
    {
        return $this->thirdAccount
            ->where('created_by_id', Auth::user()->nit)
            ->where('active', static::ACTIVE)
            ->get();
    }

    public function getTransaction()
    {
        return $this->transactions
            ->where('created_by_id', Auth::user()->nit)
            ->get();
       
    }
}
