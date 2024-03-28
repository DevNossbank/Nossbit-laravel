<?php
// app/Services/GuzzleService.php

namespace App\Services;

use GuzzleHttp\Client;


class GuzzleService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendRequest($method, $url, $body, $headers = [])
{
    //dd($method,$url,$body,$headers);
    // Cabeçalhos da requisição
    $requestOptions = [
        'headers' => $headers,
        'body' => $body,
        'verify' => false,
    ];
//$requestOption;
    // Exibe ou faz log dos cabeçalhos antes de enviar a requisição
    //dd($requestOptions);

    // Retorna a resposta da requisição
  // dd( $response = $this->client->request($method, $url, $requestOptions));
 // dd($method,$url,$requestOptions);

    try{
        $response = $this->client->request($method, $url, $requestOptions);
        //dd($requestOptions,$method,$url);
         // Cabeçalhos da resposta
         $responseHeaders = $response->getHeaders();
         //dd($requestOptions,$method,$url);
         //dump($responseHeaders);
     
         // Retorna a resposta da requisição
         return $response;
    }
    catch (Error $e){
        return $e;
    }
   
}



}









