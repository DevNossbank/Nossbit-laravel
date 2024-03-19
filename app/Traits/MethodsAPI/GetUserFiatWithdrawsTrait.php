<?php

namespace App\Traits\MethodsAPI;


trait GetUserFiatWithdrawsTrait
{

    public function getUserFiatWithdraws()
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
}