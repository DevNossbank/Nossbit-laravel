<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;

class TransferCryptoController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
    }

    private function getUserCryptoWithdraws()
    {
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserCryptoWithdraws";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

       if (is_array($data) && count($data) > 0) {
            // Retornar as propriedades desejadas
            return $data;
        }
    
       return [];
    }

    private function getUserCryptoDeposits()
    {
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserCryptoDeposits";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

       if (is_array($data) && count($data) > 0) {
            // Retornar as propriedades desejadas
            return $data;
        }
    
       return [];
    }

    protected function transferCrypto(Request $request)
    {

        $withdrawsCrypto = $this->getUserCryptoWithdraws();

        $depositsCrypto = $this->getUserCryptoDeposits();

        return view('site.transferCrypto', compact('withdrawsCrypto','depositsCrypto'));

    }
}