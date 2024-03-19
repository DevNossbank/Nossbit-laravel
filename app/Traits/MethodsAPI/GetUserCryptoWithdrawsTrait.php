<?php

namespace App\Traits\MethodsAPI;

use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;

trait GetUserCryptoWithdrawsTrait
{

    
    public function getUserCryptoWithdraws()
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

}