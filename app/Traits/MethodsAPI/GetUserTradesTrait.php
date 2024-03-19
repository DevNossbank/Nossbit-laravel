<?php

namespace App\Traits\MethodsAPI;

use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;

trait GetUserTradesTrait
{

    public function getUserTrades($coin = null)
    {
        $query = [];
        if ($coin) {
            $query['coin'] = $coin;
        }

        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserTrades";
        if (!empty($query)) {
            $apiUrl .= '?' . http_build_query($query);
        }

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