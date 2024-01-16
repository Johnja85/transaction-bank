<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PutRequest;
use App\Http\Requests\Account\StoreRequest;
use App\Models\Account;
use App\Repositories\AccountRespositoryInterface;
use App\Services\AccountTransacService;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountTransacService;
    protected $account;

    public function __construct(AccountTransacService $accountTransacService, AccountRespositoryInterface $account)
    {
        $this->accountTransacService = $accountTransacService;
        $this->account = $account;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $model = 'App\Models\Account';
        // $accounts = $this->accountTransacService->getByPaginate($model);

        $accounts = Account::paginate('4');
        
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
        $validatedData = $request->validated();
        $ownAccount = $this->account->store($validatedData);
        // $account = $this->accountTransacService->storeAccount($request);
        
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
        // dd($request->validated());
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
