<?php

namespace App\Providers;

use App\MethodFactory\Accounts\Factory\FactoryOwnAccount;
use App\MethodFactory\Accounts\Factory\FactoryThirdAccount;
use App\MethodFactory\Accounts\Intefaces\FactoryAccountInterface;
use App\Models\Account;
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
        // $this->app->bind(FactoryAccountInterface::class, FactoryThirdAccount::class);
        // $this->app->bind(FactoryAccountInterface::class, FactoryOwnAccount::class);
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
