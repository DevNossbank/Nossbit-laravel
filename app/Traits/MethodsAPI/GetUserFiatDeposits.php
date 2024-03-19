<?php

namespace App\Traits\MethodsAPI;

use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;

trait GetUserFiatDeposits
{

    public  function getUserFiatDeposits()
    {
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserFiatDeposits";

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
}