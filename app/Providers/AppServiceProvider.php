<?php

namespace App\Providers;

use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Repositories\AccountRespositoryInterface;
use App\Repositories\ThirdAccountRepository;
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
        $this->app->bind(AccountRespositoryInterface::class, ThirdAccountRepository::class);
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
