<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferCryptoController extends Controller
{
    protected function transferCrypto(Request $request)
    {

        return view('site.transferCrypto');

    }
}
