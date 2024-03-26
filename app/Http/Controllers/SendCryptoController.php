<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;

class SendCryptoController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
    }

    private function getNetwork($value)
    {
        $network = '';

        switch ($value) {
            case 'Solana':
                $network = 'sol';
                break;
            case 'Bitcoin':
                $network = 'btc';
                break;
            case 'Ethereum [ERC-20]':
                $network = 'eth';
                break;
            case 'Tron':
                $network = 'trx';
                break;
        }

        return $network;
    }

    protected function sendMethod(Request $request)
    {

        $request->validate([
            'Value' => 'required|max:255',
            'Wallet' => 'required|min:25',
            'Coin' => 'required|in:USDT,ETH,BTC,SOL,USDC,TRX',
            'Network' => 'required|in:Ethereum [ERC-20],Bitcoin,Solana,Tron',
        ]);

        $cryptoValueWithoutFormatation = $request->input('Value');
        $walletID = $request->input('Wallet');
        $coin = $request->input('Coin');
        $network = $request->input('Network');

        $value = str_replace(',', '', $cryptoValueWithoutFormatation);

        $networkForAPI = $this->getNetwork($network);


        $apiUrl = "https://brasilbitcoin.com.br/caas/sendCrypto";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"address":"' . $walletID . '",  "coin": "' . $coin . '", "amount": ' . $value . ', "network": "' . $networkForAPI . '" }';

        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {
            $success = $data['success'];

            return $success;
        } else {
            return response()->json(['error' => 'Erro ao fazer transferencia.']);
        }

    }
}
