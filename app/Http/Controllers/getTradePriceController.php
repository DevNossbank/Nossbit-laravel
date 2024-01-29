<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;

class getTradePriceController extends Controller
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
    public function getTradePrice(Request $request) 
    {
        $request->validate([
            'valor' => 'required',
            'cryptoExchange' => 'required',
            'cryptoReceipt'=> 'required'
        ]);
        $cryptoExchange = $request->input('cryptoExchange');
        $cryptoReceipt = $request->input('cryptoReceipt');


        $value = $request->input('valor');

        $side = $this->determineOperation($cryptoExchange);
        
        $market = $this->determineMarket($cryptoReceipt, $cryptoExchange);

        $apiUrl = "https://brasilbitcoin.com.br/caas/getTradePrice";
        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"amount": '.$value.',  "market": "'.$market.'", "side": "'.$side.'"}';

        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {
            $price = $data['price'];

            if($side == "buy"){
                $receiptValue = $value / $price;
            }
            if($side == "sell"){
                $receiptValue = $value * $price;
            }

            $data = array($receiptValue, $price);
    
            return $data;
        } else {
            return response()->json(['error' => 'Erro ao obter o saldo.']);
        }
    }
}
