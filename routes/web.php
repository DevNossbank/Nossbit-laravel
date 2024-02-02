<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Helper\EncryptionController;
use App\Http\Controllers\TesteAuth;
use App\Http\Middleware\HeaderAuthentication;
use App\Http\Controllers\CheckBalanceController;
use App\Http\Controllers\getTradePriceController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TransferCryptoController;
use App\Http\Controllers\NewFiatWithdrawController;
use App\Http\Controllers\GenerateFiatDepositController;

use TCG\Voyager\Facades\Voyager;
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
    return view('site.index'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/MyWallet', [CheckBalanceController::class, 'checkBalance'])->middleware('auth')->name('wallet');

Route::get('/TransferCrypto', [TransferCryptoController::class, 'transferCrypto'])->middleware('auth')->name('transferCrypto');



Route::get('/negociar', [TesteAuth::class, 'teste'])->middleware('auth')->name('negociar');



Route::view('/trade', 'site.trade')->middleware('auth')->name('trade');


Route::post('/tradeAPI', [getTradePriceController::class, 'getTradePrice']);

Route::post('/tradeConfirmation',  [TradeController::class, 'tradeMethod']);

Route::post('/withdrawConfirmation',  [NewFiatWithdrawController::class, 'withdrawMethod']);

Route::post('/deposit',  [GenerateFiatDepositController::class, 'depositMethod']);




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
