<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AllTradeController;
use App\Http\Controllers\CheckBalanceController;
use App\Http\Controllers\getTradePriceController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TransferCryptoController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\ExchangeController;

use App\Http\Controllers\NewFiatWithdrawController;
use App\Http\Controllers\GenerateFiatDepositController;
use App\Http\Controllers\SendCryptoController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\RegisterController;






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



Route::get('/MyWallet', [CheckBalanceController::class, 'checkBalance'])->middleware('auth')->name('wallet');

Route::get('/Deposit', [DepositController::class, 'depositView'])->middleware('auth')->name('deposit');

Route::get('/Withdraw', [WithdrawController::class, 'withdrawView'])->middleware('auth')->name('withdraw');



Route::get('/TransferCrypto', [TransferCryptoController::class, 'transferCrypto'])->middleware('auth')->name('transferCrypto');

Route::get('/MyTrades', [AllTradeController::class, 'allTrade'])->middleware('auth')->name('trades');


Route::get('/trade', [ExchangeController::class, 'exchangeView'])->middleware('auth')->name('trade');


Route::post('/tradeAPI', [getTradePriceController::class, 'getTradePrice']);

Route::post('/tradeConfirmation',  [TradeController::class, 'tradeMethod']);

Route::post('/withdrawConfirmation',  [NewFiatWithdrawController::class, 'withdrawMethod']);

Route::post('/deposit',  [GenerateFiatDepositController::class, 'depositMethod']);

Route::post('/transferCryptoConfirmation',  [SendCryptoController::class, 'sendMethod']);

Route::post('/Wallet',  [GetCryptoAddress::class, 'getWallet']);



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*

Route::get('/enviar-email-teste', [EmailController::class, 'enviarEmailTeste']);
*/
Route::get('/enviar-email-teste', [EmailController::class, 'enviarEmailTeste'])->name('passou-papai');


//Route::post('/enviar-email', [EmailController::class, 'enviarEmailTeste'])->name('enviar-email');

Route::post('/send-verification-code', [RegisterController::class, 'sendVerificationCode'])->name('send-verification-code');



Route::get('/liberar-acesso/{userId?}', [LiberarAcessoController::class, 'liberarAcesso'])->name('o-papi');
