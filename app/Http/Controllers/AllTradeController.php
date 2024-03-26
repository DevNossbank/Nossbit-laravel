<?php

namespace App\Http\Controllers;

use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
use Illuminate\Http\Request;
use App\Traits\MethodsAPI\GetUserTradesTrait;


class AllTradeController extends Controller
{
   use GetUserTradesTrait;

   protected $guzzleService;
   protected $authenticationHeaderService;

   public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
   {
       $this->guzzleService = $guzzleService;

       $this->authenticationHeaderService = $authenticationHeaderService;

   }

    protected function allTrade(Request $request)
    {
        $request->validate([
            'coin' => 'nullable|in:USDT,ETH,BTC,SOL,USDC,TRX',
        ]);


        $coin = $request->query('coin');

        $trades = $this->getUserTrades($coin);


        return view('site.allTrade', compact('trades'));

    }
}
