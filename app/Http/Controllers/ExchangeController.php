<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
Use App\Traits\MethodsAPI\GetUserBalanceTrait;


class ExchangeController extends Controller
{
    use GetUserBalanceTrait;

    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }
    
    protected function exchangeView(Request $request)
    {
        $saldo = $this->getUserBalance();

        return view('site.trade', compact('saldo'));

    }
}




