<?php

namespace App\Http\Controllers\Dashboard;

use App\BL\TransactionBl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\PutRequest;
use App\Http\Requests\Transaction\StoreRequest;
use App\Models\Account;
use App\Models\Transaction;
use App\Services\AccountTransacService;
use Illuminate\Support\Facades\Log;

class TransacController extends Controller
{
    const ACTIVE = 'yes';
    const INACTIVE = 'no';

    protected $accountService;

    public function __construct(AccountTransacService $accountService)
    {
        $this->accountService = $accountService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::paginate('4');

        return view('dashboard.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = $this->accountService->getAccount();
     
        return view('dashboard.transaction.create', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createThird()
    {
        $originAccounts = $this->accountService->getAccount();
        $thirdsAcounts = $this->accountService->getThirdAccount();

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
        $transactions = new TransactionBl($request);
        $transaction = $transactions->createTransaction();
        // $this->transactionBl->setRequest($request);
        // $transaction = $this->transactionBl->createTransaction();
        return to_route('transaction.index', compact('transaction'));
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
