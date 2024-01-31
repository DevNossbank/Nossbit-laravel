<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;


class TradeController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService; 

    public function __construct(GuzzleService $guzzleService,  AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
   
    }

    private function determineOperation($cryptoExchange){
        if($cryptoExchange=='BRL'){
            $operation = "buy";
            return $operation;
        }else{
            $operation ="sell";
            return $operation;
        }
    }

    private function determineMarket($cryptoReceipt, $cryptoExchange){
        if($cryptoReceipt != "BRL"){
            $market = $cryptoReceipt."BRL";
            return $market;
        }
        else{
            $market = $cryptoExchange."BRL";
            return $market;
        }
    }


    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tradeMethod(Request $request) 
    {

        $request->validate([
            'EXv' => 'required',
            'RCv' => 'required',
            'CoinEX'=> 'required',
            'CoinRC'=> 'required',
            'Price'=> 'required',
        ]);

        $exchangeValue = $request->input('EXv');
        $receivedValue = $request->input('RCv');
        $coinOfExchange = $request->input('CoinEX');
        $coinOfReceive = $request->input('CoinRC');
        $priceForTrade = $request->input('Price');


        $side = $this->determineOperation($coinOfExchange);
        
        $market = $this->determineMarket($coinOfReceive, $coinOfExchange);

        $apiUrl = "https://brasilbitcoin.com.br/caas/executeTrade";

        if($side=="buy"){
            $value=$receivedValue;
        }
        if($side=="sell"){
            $value=$exchangeValue;
        }

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"market": "'.$market.'","amount": '.$value.', "side": "'.$side.'","price": '.$priceForTrade.'}';
        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {
            $success = $data['success'];

            return $success;
       } else {
            return response()->json(['error' => 'Erro ao fazer trade.']);
        }
       
    }
}
 