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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



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





Route::get('/enviar-email-teste', function () {
    try {
        // Substitua 'seu-email@example.com' pelo endereço de e-mail para o qual deseja enviar o teste
        $recipientEmail = 'fernanda.miranda@nossbank.com.br';

        // Envia o e-mail de teste diretamente na rota
        Mail::raw('Teste do e-mail deu certo Opa heeee', function ($message) use ($recipientEmail) {
            $message->to($recipientEmail)
                ->subject('Assunto nenhum só teste mesmo');
        });

        return "E-mail de teste enviado para $recipientEmail.";
    } catch (\Exception $e) {
        return "Erro ao enviar e-mail de teste: " . $e->getMessage();
    }
});