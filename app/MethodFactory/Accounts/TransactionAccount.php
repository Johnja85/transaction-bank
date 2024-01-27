<?php

namespace App\MethodFactory\Accounts;

use App\MethodFactory\Accounts\Interfaces\FactoryTransactionInterface;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionAccount implements FactoryTransactionInterface
{
    protected Transaction $transactions;

    public function __construct()
    {
        $this->transactions = new Transaction();
    }
    public function create($request, $accountOrigin, $accountDestination)
    {
        try{
            if ($request) {
                $accountOrigin
                    ->where('idaccount',$request['account'])
                    ->decrement('balance', $request['value']);
                
                $accountDestination
                    ->where('idaccount',$request['destination_account'])
                    ->increment('balance', $request['value']);

                $this->transactions->create([
                    'account' => $request['account'],
                    'destination_account' => $request['destination_account'],
                    'value' => $request['value'],
                    'observation' => $request['observation'],
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

    public function get()
    {
        return $this->transactions->where('created_by_id', Auth::user()->nit)->paginate('4');
    }
}