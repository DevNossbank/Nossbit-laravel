<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;



class WithdrawController extends Controller
{

    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    private function getUserFiatWithdraws()
    {
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserFiatWithdraws";

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


    protected function withdrawView(Request $request)
    {

        $withdraws = $this->getUserFiatWithdraws();


        return view('site.withdraw', compact('withdraws'));

    }
}



