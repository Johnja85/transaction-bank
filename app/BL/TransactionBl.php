<?php

namespace App\BL;

use App\Models\Account;
use App\Models\Transaction;
use App\Http\Requests\Transaction\StoreRequest;
use App\Models\Third_account;
use App\Models\ThirdAccount;
use Illuminate\Support\Facades\Auth;

class TransactionBl
{
    protected Transaction $transaction;

    protected Account $accountOrigin;

    protected ThirdAccount $accountDestination;

    protected StoreRequest $request;

    public function __construct(StoreRequest $request)
    {
        $this->request = $request;
        $this->accountOrigin = Account::where('idaccount', $this->request->account)->first();
        $this->accountDestination = ThirdAccount::where('idaccount', $this->request->destination_account)->first();
        $this->transaction = new Transaction();    
    }

    public function createTransaction()
    {
        try{
            if ($this->request) {
                $this->accountOrigin->decrement('balance', $this->request->value);
                $this->accountDestination->increment('balance', $this->request->value);    
                $this->transaction->create([
                    'account' => $this->request->account,
                    'destination_account' => $this->request->destination_account,
                    'value' => $this->request->value,
                    'observation' => $this->request->observation,
                    'created_by_id' => Auth::user()->nit
                ]);
        
                return true;
            }
            
        }catch(\Exception $e){
            return [
                'error' => true,
                'message' => 'Error al intentar almacenar el registro: ' . $e->getMessage(),
            ];
        }
    }

    public function get(){
        return $this->transaction;
    }

    
}