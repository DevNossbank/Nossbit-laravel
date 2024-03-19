<?php

namespace App\Traits\MethodsAPI;

trait GetUserBalanceTrait
{

    public function getUserBalance()
    {
        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserBalances";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {
            $saldo = $data['data'];
            return $saldo;

        } else {
            return response()->json(['error' => 'Erro ao obter o saldo.']);
        }
    }
}