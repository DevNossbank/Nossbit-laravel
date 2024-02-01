<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;



class CheckBalanceController extends Controller
{

    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    private function getUserBalance()
    {

        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserBalances";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {
            $saldo = $data['data'];
            return $saldo;
        } else {
            return response()->json(['error' => 'Erro ao obter o saldo.']);
        }
    }

    

    protected function checkBalance(Request $request)
    {
        $saldo = $this->getUserBalance();

        return view('site.wallet', compact('saldo'));

    }
}




