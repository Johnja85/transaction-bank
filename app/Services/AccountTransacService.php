<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AccountTransacService
{
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

    
    public function store($request)
    {
        try{
            // Restar al valor de la cuenta
            Account::where('idaccount', $request->account)->decrement('balance', $request->value);

            // Sumar al valor de la cuenta
            Account::where('idaccount', $request->destination_account)->increment('balance', $request->value);
    
            Transaction::create([
                'account' => $request->account,
                'destination_account' => $request->destination_account,
                'value' => $request->value,
                'observation' => $request->observation,
                'created_by_id' => Auth::user()->nit
            ]);
    
            return true;
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
            // dd($request->input());
            // $validated = $request->validate([
            //         'idaccount' => ['required', 'string', 'max:18', 'unique:'.Account::class],
            //         'description' => ['required', 'string', 'max:255'],
            //         'balance' => ['required', 'max:50'],
            //         'active' => ['required']
            //     ]);
            Account::create([
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

    public function get()
    {
        return Account::where('created_by_id', Auth::user()->nit)->get();
    }
}
