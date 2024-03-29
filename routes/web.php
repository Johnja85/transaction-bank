<?php

use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\ThirdAccountController;
use App\Http\Controllers\Dashboard\TransacController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'dashboard'],function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('transaction/third-create', [TransacController::class, 'createThird'])->name('transaction.createThird');
    Route::resource('account', AccountController::class);
    Route::resource('third_account', ThirdAccountController::class);
    Route::resource('transaction', TransacController::class);
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
