<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PutRequest;
use App\Http\Requests\Account\StoreRequest;
use App\MethodFactory\Accounts\Factory\FactoryOwnAccount;
use App\Models\Account;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    protected $account;
    protected $ownAccount;

    public function __construct(FactoryOwnAccount $ownAccount)
    {
        $this->ownAccount = $ownAccount;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = $this->ownAccount->get();        
        
        return view('dashboard.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.account.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $ownAccount = $this->ownAccount->create($request->validated());
        
        return view('dashboard', compact('ownAccount'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('dashboard.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Account $account)
    {
        $account->update($request->validated());

        return to_route('account.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        
        return to_route('account.index');
    }
}
