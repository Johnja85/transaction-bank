<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PutRequest;
use App\Http\Requests\Account\StoreRequest;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('created_by_id', Auth::user()->nit)->paginate('2');
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
        // dd($request->input());
        // $validated = $request->validate([
        //         'idaccount' => ['required', 'string', 'max:18', 'unique:'.Account::class],
        //         'description' => ['required', 'string', 'max:255'],
        //         'balance' => ['required', 'max:50'],
        //         'active' => ['required']
        //     ]);
        $account = Account::create([
            'idaccount' => $request->idaccount,
            'description' => $request->description,
            'balance' => $request->balance,
            'created_by_id' => Auth::user()->nit,
            'active' => $request->active
        ]);

        return view('dashboard');
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
        // dd($account);
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
