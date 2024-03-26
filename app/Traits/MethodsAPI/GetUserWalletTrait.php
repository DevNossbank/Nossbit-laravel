<?php

namespace App\Traits\MethodsAPI;

trait GetUserWalletTrait
{
    private function userWallet($coin){

        $apiUrl = "https://brasilbitcoin.com.br/caas/getUserWallets?coin=".$coin."";

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);


        if (isset($data[$coin])) {
            $wallet = $data[$coin][0]['address'];
            return $wallet;

            
        } else {
             $newWallet = $this->createNewAddress($coin); 
             return $newWallet;
            
        }
        

    
    }

    private function createNewAddress($coin){
        $apiUrl = "https://brasilbitcoin.com.br/caas/generateNewCryptoAddress?coin=".$coin;

        $body = '{}';

        $headers = $this->authenticationHeaderService->getHeaders();

        $response = $this->guzzleService->sendRequest('GET', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        //return $data

        if ($data['success']) {
            $walletAPI = $data['data']['address'];
            return $walletAPI; 
        } 
        
        else {
            
        }
    }
}