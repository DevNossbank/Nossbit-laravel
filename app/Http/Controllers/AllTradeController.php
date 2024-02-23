<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;

class AllTradeController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    private function getUserTrades($coin = null)
    {
        $query = [];
        if ($coin) {
            $query['coin'] = $coin;
        }
       /* if ($type) {
            $query['type'] = $type;
        }*/

        //$apiUrl = "https://brasilbitcoin.com.br/caas/getUserTrades".$query;

        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserTrades";
        if (!empty($query)) {
            $apiUrl .= '?' . http_build_query($query);
        }

        //$teste = json_encode($query, true);


        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

       if (is_array($data) && count($data) > 0) {
            return $data;
        }
    
       return [];
    }


    protected function allTrade(Request $request)
    {
        $request->validate([
            'coin' => 'nullable|in:USDT,ETH,BTC,SOL',
        ]);


        $coin = $request->query('coin');

        $trades = $this->getUserTrades($coin);


        return view('site.allTrade', compact('trades'));

    }
}
