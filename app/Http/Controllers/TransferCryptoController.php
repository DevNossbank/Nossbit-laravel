<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;
use Exception;

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

    private function userWallet(){

        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserWallets";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        $coins = ['ETH', 'USDT','BTC','SOL'];
        $wallets = [];

        foreach ($coins as $coin) {
            if (isset($data[$coin]) && count($data[$coin]) > 0) {
                $wallets[$coin] = [
                    'coin' => $data[$coin][0]['coin'],
                    'networkName' => $data[$coin][0]['networkName'],
                    'address' => $data[$coin][0]['address']
                ];
            } else {
                // Chame o método para criar um novo endereço de carteira
                $newWallet = $this->createNewAddress($coin);
                $wallets[$coin] = [
                    'coin' => $newWallet['coin'],
                    'networkName' => $newWallet['networkName'],
                    'address' => $newWallet['address']
                ];               
            }
        }

        return $wallets;
    
    }

    private function createNewAddress($coin){
        $apiUrl = "https://brasilbitcoin.com.br/caas/generateNewCryptoAddress?coin=".$coin;

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success'] && isset($data['data'])) {
            // Retorne os dados da nova carteira
            return [
                'coin' => $data['data']['coin'],
                'networkName' => $data['data']['networkName'],
                'address' => $data['data']['address']
            ];
        } else {
            // Trate o erro aqui
            // ...
        }

    }

    protected function transferCrypto(Request $request)
    {

        $withdrawsCrypto = $this->getUserCryptoWithdraws();

        $depositsCrypto = $this->getUserCryptoDeposits();

        $wallets = $this->userWallet();

        return view('site.transferCrypto', compact('withdrawsCrypto','depositsCrypto','wallets'));

    }
}
