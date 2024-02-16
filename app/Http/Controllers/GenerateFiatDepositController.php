<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;


class GenerateFiatDepositController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService; 

    public function __construct(GuzzleService $guzzleService,  AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
   
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function depositMethod(Request $request) 
    {

        $request->validate([
            'BRLdeposit' => 'required',
        ]);


        $valueWithoutFormatation = $request->input('BRLdeposit');

        $value = str_replace(',', '', $valueWithoutFormatation);


        $apiUrl = "https://brasilbitcoin.com.br/caas/generateFiatDepositQrCode";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"value": '.$value.'}';
        
        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {

            $paymentString = $data['paymentString'];


            return $paymentString;
       } else {

        }
       
    }
}
