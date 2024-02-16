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

    protected function sendMethod(Request $request)
    {

        $request->validate([
            'Value' => 'required|max:255',
            'Wallet' => 'required|min:25',
        ]);

        $cryptoValueWithoutFormatation = $request->input('Value');
        $walletID = $request->input('Wallet');

        $value = str_replace(',', '', $cryptoValueWithoutFormatation);


        $apiUrl = "https://brasilbitcoin.com.br/caas/sendCrypto";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"address":"'.$walletID.'",  "coin": "USDT", "amount": '.$value.', "network": "eth" }';

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
