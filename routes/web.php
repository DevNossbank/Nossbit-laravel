<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AllTradeController;
use App\Http\Controllers\CheckBalanceController;
use App\Http\Controllers\getTradePriceController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\TransferCryptoController;
use App\Http\Controllers\NewFiatWithdrawController;
use App\Http\Controllers\GenerateFiatDepositController;
use App\Http\Controllers\SendCryptoController;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Mail;






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

Route::get('/TransferCrypto', [TransferCryptoController::class, 'transferCrypto'])->middleware('auth')->name('transferCrypto');

Route::get('/MyTrades', [AllTradeController::class, 'allTrade'])->middleware('auth')->name('trades');


Route::view('/trade', 'site.trade')->middleware('auth')->name('trade');


Route::post('/tradeAPI', [getTradePriceController::class, 'getTradePrice']);

Route::post('/tradeConfirmation',  [TradeController::class, 'tradeMethod']);

Route::post('/withdrawConfirmation',  [NewFiatWithdrawController::class, 'withdrawMethod']);

Route::post('/deposit',  [GenerateFiatDepositController::class, 'depositMethod']);

Route::post('/transferCryptoConfirmation',  [SendCryptoController::class, 'sendMethod']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*

Route::get('/enviar-email-teste', [EmailController::class, 'enviarEmailTeste']);
*/
Route::get('/enviar-email-teste', [EmailController::class, 'enviarEmailTeste'])->name('passou-papai');


//Route::post('/enviar-email', [EmailController::class, 'enviarEmailTeste'])->name('enviar-email');