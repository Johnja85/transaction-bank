<?php

namespace App\Http\Controllers\Dashboard;

use App\BL\TransactionBl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\PutRequest;
use App\Http\Requests\Transaction\StoreRequest;
use App\MethodFactory\Accounts\Factory\FactoryOwnAccount;
use App\MethodFactory\Accounts\Factory\FactoryThirdAccount;
use App\MethodFactory\Accounts\Factory\FactoryTransactionAccount;
use App\Services\AccountTransacService;
use Illuminate\Support\Facades\Log;

class TransacController extends Controller
{
    const IS_ACTIVE = true;

    protected $accountService;
    protected $transaction;
    protected $ownAccounts;
    protected $thirdAccount;

    public function __construct(AccountTransacService $accountService, FactoryTransactionAccount $transaction, FactoryOwnAccount $ownAccounts, FactoryThirdAccount $thirdAccount)
    {
        $this->accountService = $accountService;
        $this->transaction = $transaction;
        $this->ownAccounts = $ownAccounts;
        $this->thirdAccount = $thirdAccount;
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transaction->get();

        return view('dashboard.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = $this->ownAccounts->get();
     
        return view('dashboard.transaction.create', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createThird()
    {
        $originAccounts = $this->ownAccounts->get();
        $thirdsAcounts = $this->thirdAccount->get();

        return view('dashboard.transaction.third.create', ['originAccounts' => $originAccounts, 'thirdsAcounts' => $thirdsAcounts ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param App\Http\Requests\Transaction\StoreRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // dd($request->validated());

        $this->transaction->create($request->validated());
        $transactions = $this->transaction->get();
        
        return to_route('transaction.index', compact('transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, $id)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
