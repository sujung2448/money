<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DebitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');




Route::get('auth/register', [RegisterController::class, 'index'])-> name('auth.register.index');
Route::post('auth/register', [RegisterController::class, 'store'])-> name('auth.register.store');

Route::get('auth/login', [LoginController::class, 'index'])-> name('auth.login.index');
Route::post('auth/login', [LoginController::class, 'login'])-> name('auth.login.attempt');
Route::post('auth/logout', [LoginController::class, 'logout'])-> name('auth.logout');


Route::get('moneys', [MoneyController::class, 'index'])-> name('moneys.index');
Route::post('moneys/{id}', [MoneyController::class, 'store'])-> name('moneys.store');

Route::get('credit', [CreditController::class, 'credit'])-> name('credit.credit');
Route::get('credit/list', [CreditController::class, 'creditList'])-> name('credit.list');
Route::post('credit/store', [CreditController::class, 'store'])-> name('credit.store');
Route::delete('credit/delete', [CreditController::class, 'delete'])-> name('credit.delete');
Route::delete('credit/mass-delete', [CreditController::class, 'massDelete'])-> name('credit.mass-delete');


Route::get('debit', [DebitController::class, 'debit'])-> name('debit.debit');
Route::get('debit/list', [DebitController::class, 'debitList'])-> name('debit.list');
Route::post('debit/store', [DebitController::class, 'store'])-> name('debit.store');
Route::delete('debit/delete', [DebitController::class, 'delete'])-> name('debit.delete');
Route::delete('debit/mass-delete', [DebitController::class, 'massDelete'])-> name('debit.mass-delete');