<?php

namespace App\Providers;

use App\Models\Account;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('no_greater_than_bd', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $accountId = $data[$parameters[0]];
            $maxPrice = Account::where('idaccount', $accountId)->value('balance');

            return $value <= $maxPrice;
        });   
    }
}
