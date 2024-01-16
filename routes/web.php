<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Helper\EncryptionController;
use App\Http\Controllers\TesteAuth;
use App\Http\Middleware\HeaderAuthentication;


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

Route::get('/test-config', function () {
    $apiKey = config('services.api.authentication');
    $apiSecret = config('services.api.cnpj');

    return "API Key: $apiKey, API Secret: $apiSecret";
});

Route::get('/test-encryption/{testem}', [EncryptionController::class, 'testEncryption']);

Route::get('/test', [EncryptionController::class, 'Encryption']);


Route::get('/test-teste', function () {
    $apiKey = config('services.api.authentication');
    $apiSecret = config('services.api.cnpj');
    
    return "API Key: $apiKey, API Secret: $apiSecret";
});

Route::middleware([HeaderAuthentication::class])->group(function () {
    // Suas rotas protegidas pelo middleware aqui
    Route::get('/sua-rota', 'SeuController@suaFuncao');
    // Adicione outras rotas conforme necessário
});



Route::get('/test2', [EncryptionController::class, 'variableEncryption']);


Route::get('/negociar', [TesteAuth::class, 'teste'])->middleware('auth')->name('negociar');
